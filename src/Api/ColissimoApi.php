<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Api;

use Scraper\Scraper\Api\AbstractApi;
use Scraper\ScraperColissimo\Exception\ColissimoResponseUnknownException;
use Scraper\ScraperColissimo\Model\Message;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;

abstract class ColissimoApi extends AbstractApi
{
    protected function getStatusCode(): int
    {
        try {
            return $this->response->getStatusCode();
        } catch (ExceptionInterface $exception) {
            throw new ColissimoResponseUnknownException('Colissimo did not respond: ' . $exception->getMessage(), 0);
        }
    }

    protected function getContent(): string
    {
        try {
            return $this->response->getContent(false);
        } catch (ExceptionInterface $exception) {
            throw new ColissimoResponseUnknownException('Cannot read the Colissimo response: ' . $exception->getMessage(), $this->getStatusCode());
        }
    }

    protected function getContentTypeHeader(): ?string
    {
        try {
            $headers = $this->response->getHeaders(false);
        } catch (ExceptionInterface) {
            return null;
        }

        return $headers['content-type'][0] ?? null;
    }

    /**
     * @return array<mixed>
     */
    protected function decodeJson(string $json): array
    {
        try {
            $data = json_decode($json, true, 512, \JSON_THROW_ON_ERROR);
        } catch (\JsonException $exception) {
            throw new ColissimoResponseUnknownException(\sprintf('Invalid JSON returned by Colissimo (HTTP %d): %s', $this->getStatusCode(), $exception->getMessage()), $this->getStatusCode(), $json);
        }

        if (!\is_array($data)) {
            throw new ColissimoResponseUnknownException(\sprintf('Unexpected JSON returned by Colissimo (HTTP %d)', $this->getStatusCode()), $this->getStatusCode(), $json);
        }

        return $data;
    }

    protected static function toString(mixed $value): string
    {
        return \is_scalar($value) ? (string) $value : '';
    }

    protected static function toNullableString(mixed $value): ?string
    {
        return \is_scalar($value) && '' !== (string) $value ? (string) $value : null;
    }

    /**
     * @return list<Message>
     */
    protected static function createMessages(mixed $messages): array
    {
        if (!\is_array($messages)) {
            return [];
        }

        $result = [];

        foreach ($messages as $message) {
            if (!\is_array($message)) {
                continue;
            }

            $result[] = new Message(
                self::toString($message['id'] ?? ''),
                self::toString($message['type'] ?? ''),
                self::toString($message['messageContent'] ?? ''),
            );
        }

        return $result;
    }
}
