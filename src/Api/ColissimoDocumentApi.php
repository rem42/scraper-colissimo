<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Api;

use Scraper\ScraperColissimo\Exception\ColissimoResponseException;
use Scraper\ScraperColissimo\Model\Document\DocumentError;
use Scraper\ScraperColissimo\Model\Document\DocumentResult;
use Scraper\ScraperColissimo\Model\Message;

abstract class ColissimoDocumentApi extends ColissimoApi
{
    public function execute(): DocumentResult
    {
        $statusCode = $this->getStatusCode();
        $data = $this->decodeJson($this->getContent());

        $result = new DocumentResult();
        $result->errorCode = self::toString($data['errorCode'] ?? '');
        $result->errorLabel = self::toNullableString($data['errorLabel'] ?? null);
        $result->documentId = self::toNullableString($data['documentId'] ?? null);

        foreach (\is_array($data['errors'] ?? null) ? $data['errors'] : [] as $item) {
            if (!\is_array($item)) {
                continue;
            }

            $error = new DocumentError();
            $error->code = self::toString($item['code'] ?? '');
            $error->message = self::toString($item['message'] ?? '');
            $result->errors[] = $error;
        }

        if (!$result->isSuccess() || $statusCode < 200 || $statusCode >= 300) {
            $messages = array_map(
                static fn (DocumentError $error): Message => new Message($error->code, Message::TYPE_ERROR, $error->message),
                $result->errors,
            );

            if ([] === $messages) {
                $messages[] = new Message($result->errorCode, Message::TYPE_ERROR, $result->errorLabel ?? 'Unknown error');
            }

            throw new ColissimoResponseException('Colissimo document error', $messages, $statusCode);
        }

        return $result;
    }
}
