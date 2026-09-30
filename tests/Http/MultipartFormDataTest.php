<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Tests\Http;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Scraper\ScraperColissimo\Http\MultipartFormData;
use Scraper\ScraperColissimo\Http\MultipartParser;

/**
 * @internal
 */
#[CoversClass(MultipartFormData::class)]
final class MultipartFormDataTest extends TestCase
{
    public function testBody(): void
    {
        $formData = new MultipartFormData('boundary42')
            ->addField('parcelNumber', '8R00000000001')
            ->addFile('file', 'invoice.pdf', '%PDF-content', 'application/pdf')
        ;

        $this->assertSame('multipart/form-data; boundary=boundary42', $formData->getContentType());
        $this->assertSame(
            "--boundary42\r\nContent-Disposition: form-data; name=\"parcelNumber\"\r\n\r\n8R00000000001\r\n"
            . "--boundary42\r\nContent-Disposition: form-data; name=\"file\"; filename=\"invoice.pdf\"\r\nContent-Type: application/pdf\r\n\r\n%PDF-content\r\n"
            . "--boundary42--\r\n",
            $formData->getBody(),
        );

        $parts = MultipartParser::parse($formData->getBody(), $formData->getContentType());
        $this->assertCount(2, $parts);
        $this->assertSame('%PDF-content', $parts[1]->body);
    }

    public function testRandomBoundary(): void
    {
        $this->assertNotSame(new MultipartFormData()->getContentType(), new MultipartFormData()->getContentType());
    }
}
