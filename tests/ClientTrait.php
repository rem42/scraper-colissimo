<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Tests;

use Scraper\Scraper\Client;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @internal
 */
trait ClientTrait
{
    /** @var array{method: string, url: string, options: array<string, mixed>}|null */
    private ?array $lastRequest = null;

    /**
     * @param array<string, list<string>> $headers
     */
    protected function createClient(string $content, int $statusCode = 200, array $headers = []): Client
    {
        $response = $this->createStub(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn($statusCode);
        $response->method('getContent')->willReturn($content);
        $response->method('getHeaders')->willReturn($headers);

        $httpClient = $this->createStub(HttpClientInterface::class);
        $httpClient->method('request')->willReturnCallback(function (string $method, string $url, array $options) use ($response): ResponseInterface {
            $this->lastRequest = ['method' => $method, 'url' => $url, 'options' => $options];

            return $response;
        });

        return new Client($httpClient);
    }

    protected static function multipart(string $boundary, string $json, array $attachments = []): string
    {
        $content = "--{$boundary}\r\nContent-Type: application/json;charset=UTF-8\r\nContent-Transfer-Encoding: binary\r\nContent-ID: <jsonInfos>\r\n\r\n{$json}\r\n";

        foreach ($attachments as $contentId => $body) {
            $content .= "--{$boundary}\r\nContent-Type: application/octet-stream\r\nContent-Transfer-Encoding: binary\r\nContent-ID: <{$contentId}>\r\n\r\n{$body}\r\n";
        }

        return $content . "--{$boundary}--\r\n";
    }

    protected static function fixture(string $name): string
    {
        return (string) file_get_contents(__DIR__ . '/fixtures/' . $name);
    }
}
