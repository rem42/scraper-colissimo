<?php

namespace Scraper\ScraperColissimo\Adapter;

use Scraper\ScraperColissimo\Entity\ColissimoJSON;
use Scraper\ScraperColissimo\Exception\ColissimoResponseException;
use Scraper\ScraperColissimo\Exception\ColissimoResponseUnknownException;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class ColissimoAdapter
{
    public static function execute(ResponseInterface $response): ColissimoJSON
    {
        if ($response->getStatusCode() >= 300 || $response->getStatusCode() < 200) {
            self::handleException($response);
        }
        $content      = $response->getContent();
        $colissimoXML = new ColissimoJSON();

        $result = self::extractData($content);

        $i = 1;

        foreach ($result as $item) {
            $header = self::extractHeader($item);

            if (\count($header) > 0) {
                if (false !== strpos((string) $header['Content-Type'], 'application/json')) {
                    $colissimoXML->setJson(trim(substr($item, (int) $header['offsetEnd'])));
                } elseif (3 === $i) {
                    $colissimoXML->setCn23(trim(substr($item, (int) $header['offsetEnd'])));
                } else {
                    $colissimoXML->setFile(trim(substr($item, (int) $header['offsetEnd'])));
                }
            }
            $i++;
        }

        return $colissimoXML;
    }

    private static function handleException(ResponseInterface $response): void
    {
        $content = $response->getContent(false);
        $data    = self::extractData($content);

        if (1 !== \count($data)) {
            throw new ColissimoResponseUnknownException('Colissimo error, more than one value expected');
        }
        $data = $data[0];

        $header = self::extractHeader($data);

        $messages = json_decode(trim(substr($data, (int) $header['offsetEnd'])))->messages;

        throw new ColissimoResponseException('Colissimo request error: ', $messages);
    }

    /**
     * @return array<string>
     */
    private static function extractData(string $data): array
    {
        $result = [];

        if (preg_match_all('/--uuid:/', $data, $matches, \PREG_OFFSET_CAPTURE)) {
            for ($i = 0; $i < \count($matches[0]) - 1; $i++) {
                if ($i + 1 < \count($matches[0])) {
                    $result[$i] = substr(
                        $data,
                        $matches[0][$i][1],
                        $matches[0][$i + 1][1] - $matches[0][$i][1]
                    );
                } else {
                    $result[$i] = substr(
                        $data,
                        $matches[0][$i][1],
                        \strlen($data)
                    );
                }
            }
        }

        return $result;
    }

    /**
     * @return array<string, bool|int|string>
     */
    private static function extractHeader(string $part): array
    {
        $content         = 'Content-';
        $header          = [];
        $headerLineStart = strpos($part, $content, 0);
        $endLine         = 0;
        while (false !== $headerLineStart) {
            $header['offsetStart'] = $headerLineStart;
            $endLine               = strpos($part, "\r\n", $headerLineStart);
            $headerLine            = explode(': ', substr(
                $part,
                $headerLineStart,
                $endLine - $headerLineStart
            ));
            $header[$headerLine[0]] = $headerLine[1];
            $headerLineStart        = strpos($part, $content, (int) $endLine);
        }
        $header['offsetEnd'] = $endLine;

        return $header;
    }
}
