<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Tests\Http;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Scraper\ScraperColissimo\Http\MultipartParser;
use Scraper\ScraperColissimo\Http\MultipartPart;
use Scraper\ScraperColissimo\Tests\ClientTrait;

/**
 * @internal
 */
#[CoversClass(MultipartParser::class)]
#[CoversClass(MultipartPart::class)]
final class MultipartParserTest extends TestCase
{
    use ClientTrait;

    public function testParseWithContentTypeHeader(): void
    {
        $binary = "%PDF-1.4\r\n\x00\x01\xFF binary\r\n\r\ncontent";
        $content = self::multipart('uuid:1234', '{"messages":[]}', ['label' => $binary, 'cn23' => '%PDF cn23']);

        $parts = MultipartParser::parse($content, 'multipart/mixed; boundary="uuid:1234"; start="<jsonInfos>"; type="application/json"');

        $this->assertCount(3, $parts);
        $this->assertSame('jsonInfos', $parts[0]->getContentId());
        $this->assertTrue($parts[0]->isJson());
        $this->assertSame('{"messages":[]}', $parts[0]->body);
        $this->assertSame('label', $parts[1]->getContentId());
        $this->assertSame($binary, $parts[1]->body);
        $this->assertSame('cn23', $parts[2]->getContentId());
        $this->assertSame('%PDF cn23', $parts[2]->body);
    }

    public function testParseGuessesBoundaryFromBody(): void
    {
        $content = self::multipart('uuid:9c80b689-ba3d-4c9e-8b30-344b5497b20e', '{"a":1}', ['label' => 'ZPL']);

        $parts = MultipartParser::parse($content);

        $this->assertCount(2, $parts);
        $this->assertSame('ZPL', $parts[1]->body);
    }

    public function testParseBase64Part(): void
    {
        $content = "--b\r\nContent-ID: <label>\r\nContent-Transfer-Encoding: base64\r\n\r\n" . base64_encode('decoded') . "\r\n--b--";

        $parts = MultipartParser::parse($content, 'multipart/mixed; boundary=b');

        $this->assertSame('decoded', $parts[0]->body);
    }

    public function testParseNonMultipartContent(): void
    {
        $this->assertSame([], MultipartParser::parse('{"messages":[]}'));
    }

    public function testExtractBoundary(): void
    {
        $this->assertSame('abc', MultipartParser::extractBoundary('multipart/mixed; boundary=abc'));
        $this->assertSame('uuid:x y', MultipartParser::extractBoundary('multipart/mixed; boundary="uuid:x y"'));
        $this->assertNull(MultipartParser::extractBoundary('application/json'));
        $this->assertNull(MultipartParser::extractBoundary(null));
    }
}
