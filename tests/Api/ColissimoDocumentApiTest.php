<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Tests\Api;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Scraper\ScraperColissimo\Api\ColissimoDocumentApi;
use Scraper\ScraperColissimo\Api\ColissimoStoreDocumentApi;
use Scraper\ScraperColissimo\Api\ColissimoUpdateDocumentApi;
use Scraper\ScraperColissimo\Exception\ColissimoResponseException;
use Scraper\ScraperColissimo\Http\MultipartParser;
use Scraper\ScraperColissimo\Model\Credential;
use Scraper\ScraperColissimo\Model\Document\Document;
use Scraper\ScraperColissimo\Model\Document\DocumentResult;
use Scraper\ScraperColissimo\Model\Document\DocumentType;
use Scraper\ScraperColissimo\Request\ColissimoDocumentRequest;
use Scraper\ScraperColissimo\Request\ColissimoStoreDocumentRequest;
use Scraper\ScraperColissimo\Request\ColissimoUpdateDocumentRequest;
use Scraper\ScraperColissimo\Tests\ClientTrait;

/**
 * @internal
 */
#[CoversClass(ColissimoDocumentApi::class)]
#[CoversClass(ColissimoStoreDocumentApi::class)]
#[CoversClass(ColissimoUpdateDocumentApi::class)]
#[CoversClass(ColissimoDocumentRequest::class)]
#[CoversClass(Document::class)]
final class ColissimoDocumentApiTest extends TestCase
{
    use ClientTrait;

    public function testStoreCommercialInvoice(): void
    {
        $client = $this->createClient(self::fixture('document_success.json'));

        $document = new Document('8Q00000000001', DocumentType::COMMERCIAL_INVOICE, 'invoice-42.pdf', '%PDF-invoice');
        $document->parcelNumberList = ['8Q00000000002', '8Q00000000003'];

        $result = $client->send(new ColissimoStoreDocumentRequest(Credential::apiKey('my-api-key'), '101102', $document));

        $this->assertInstanceOf(DocumentResult::class, $result);
        $this->assertTrue($result->isSuccess());
        $this->assertSame('50c82f93-015f-3c41-a841-07746eee6510.pdf', $result->documentId);

        $this->assertNotNull($this->lastRequest);
        $this->assertSame('https://ws.colissimo.fr/api-document/rest/storedocument', $this->lastRequest['url']);

        $headers = $this->lastRequest['options']['headers'];
        $this->assertSame('my-api-key', $headers['apiKey']);
        $this->assertStringStartsWith('multipart/form-data; boundary=', $headers['Content-Type']);

        $parts = [];

        foreach (MultipartParser::parse($this->lastRequest['options']['body'], $headers['Content-Type']) as $part) {
            preg_match('/name="([^"]+)"/', (string) $part->getHeader('content-disposition'), $matches);
            $parts[$matches[1]] = $part;
        }

        $this->assertSame('101102', $parts['accountNumber']->body);
        $this->assertSame('8Q00000000001', $parts['parcelNumber']->body);
        $this->assertSame('COMMERCIAL_INVOICE', $parts['documentType']->body);
        $this->assertSame('invoice-42.pdf', $parts['filename']->body);
        $this->assertSame('8Q00000000002,8Q00000000003', $parts['parcelNumberList']->body);
        $this->assertSame('%PDF-invoice', $parts['file']->body);
        $this->assertSame('application/pdf', $parts['file']->getHeader('content-type'));
    }

    public function testUpdateCn23WithLogin(): void
    {
        $client = $this->createClient(self::fixture('document_success.json'));

        $client->send(new ColissimoUpdateDocumentRequest(Credential::login('login', 'secret'), '101102', new Document('8Q00000000001', DocumentType::CN23, 'cn23.pdf', '%PDF')));

        $this->assertNotNull($this->lastRequest);
        $this->assertSame('https://ws.colissimo.fr/api-document/rest/updatedocument', $this->lastRequest['url']);
        $this->assertSame('login', $this->lastRequest['options']['headers']['login']);
        $this->assertSame('secret', $this->lastRequest['options']['headers']['password']);
        $this->assertArrayNotHasKey('apiKey', $this->lastRequest['options']['headers']);
    }

    public function testError(): void
    {
        $client = $this->createClient(self::fixture('document_error.json'), 400);

        try {
            $client->send(new ColissimoStoreDocumentRequest(Credential::apiKey('key'), '101102', new Document('bad', DocumentType::CN23, 'cn23.pdf', '%PDF')));
            $this->fail('An exception should have been thrown');
        } catch (ColissimoResponseException $exception) {
            $this->assertSame(['150'], $exception->getErrorCodes());
            $this->assertStringContainsString('Numéro de colis invalide', $exception->getMessage());
        }
    }

    public function testDocumentTooLarge(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Document('8Q00000000001', DocumentType::CN23, 'cn23.pdf', str_repeat('a', Document::MAX_SIZE + 1));
    }
}
