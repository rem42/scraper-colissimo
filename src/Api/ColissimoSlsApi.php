<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Api;

use Scraper\ScraperColissimo\Exception\ColissimoResponseException;
use Scraper\ScraperColissimo\Exception\ColissimoResponseUnknownException;
use Scraper\ScraperColissimo\Http\MultipartParser;
use Scraper\ScraperColissimo\Model\Label\LabelResult;
use Scraper\ScraperColissimo\Model\Message;

/**
 * Reads the SLS "multipart/mixed" (MTOM/XOP) responses: a "jsonInfos" JSON part and 0 to 3 binary attachments
 * (label, cn23, proforma), identified by their Content-ID.
 */
abstract class ColissimoSlsApi extends ColissimoApi
{
    private const array ATTACHMENTS = ['label', 'cn23', 'proforma'];

    /** The label block is named after the web service version ("labelV31Response" for v3.1, "labelV2Response" for v2). */
    private const array LABEL_RESPONSE_KEYS = ['labelV31Response', 'labelV3Response', 'labelV2Response', 'labelResponse'];

    public function execute(): LabelResult
    {
        $statusCode = $this->getStatusCode();
        $content = $this->getContent();

        [$json, $attachments] = $this->extractParts($content);

        if (null === $json) {
            throw new ColissimoResponseUnknownException(\sprintf('Unexpected response from Colissimo (HTTP %d): no JSON information found', $statusCode), $statusCode, $content);
        }

        $data = $this->decodeJson($json);
        $messages = self::createMessages($data['messages'] ?? []);
        $errors = array_values(array_filter($messages, static fn (Message $message): bool => $message->isError()));

        if ([] !== $errors || $statusCode < 200 || $statusCode >= 300) {
            throw new ColissimoResponseException('Colissimo request error', [] !== $errors ? $errors : $messages, $statusCode);
        }

        $result = new LabelResult();
        $result->messages = $messages;

        $label = self::extractLabelResponse($data);

        $result->parcelNumber = self::toNullableString($label['parcelNumber'] ?? null);
        $result->parcelNumberPartner = self::toNullableString($label['parcelNumberPartner'] ?? null);
        $result->pdfUrl = self::toNullableString($label['pdfUrl'] ?? null);
        $result->fields = self::extractFields($label['fields'] ?? null);

        $result->label = $attachments['label'] ?? null;
        $result->cn23 = $attachments['cn23'] ?? null;
        $result->proforma = $attachments['proforma'] ?? null;

        return $result;
    }

    /**
     * @return array{0: ?string, 1: array<string, string>}
     */
    private function extractParts(string $content): array
    {
        $trimmed = ltrim($content);

        // Errors (and some gateways) answer with plain JSON instead of a multipart body
        if (str_starts_with($trimmed, '{')) {
            return [$trimmed, []];
        }

        $json = null;
        $attachments = [];
        $unnamed = [];

        foreach (MultipartParser::parse($content, $this->getContentTypeHeader()) as $part) {
            $contentId = $part->getContentId();

            if ('jsoninfos' === strtolower((string) $contentId) || (null === $json && $part->isJson())) {
                $json = trim($part->body);
                continue;
            }

            if (null !== $contentId && \in_array(strtolower($contentId), self::ATTACHMENTS, true)) {
                $attachments[strtolower($contentId)] = $part->body;
                continue;
            }

            $unnamed[] = $part->body;
        }

        // Attachments without a known Content-ID: label first, then CN23
        foreach (['label', 'cn23'] as $name) {
            if (!isset($attachments[$name]) && [] !== $unnamed) {
                $attachments[$name] = array_shift($unnamed);
            }
        }

        return [$json, $attachments];
    }

    /**
     * @param array<mixed> $data
     *
     * @return array<mixed>
     */
    private static function extractLabelResponse(array $data): array
    {
        foreach (self::LABEL_RESPONSE_KEYS as $key) {
            if (\is_array($data[$key] ?? null)) {
                return $data[$key];
            }
        }

        // Any other version of the block, e.g. a future "labelV32Response" (the XML variant is not the label block)
        foreach ($data as $key => $value) {
            if (\is_string($key) && \is_array($value) && 1 === preg_match('/^label(?!Xml).*Response$/i', $key)) {
                return $value;
            }
        }

        return isset($data['parcelNumber']) ? $data : [];
    }

    /**
     * @return array<string, string>
     */
    private static function extractFields(mixed $fields): array
    {
        if (!\is_array($fields) || !\is_array($fields['field'] ?? null)) {
            return [];
        }

        $result = [];

        foreach ($fields['field'] as $field) {
            if (\is_array($field) && isset($field['key'])) {
                $result[self::toString($field['key'])] = self::toString($field['value'] ?? '');
            }
        }

        return $result;
    }
}
