<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Tests\Api;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Scraper\ScraperColissimo\Api\ColissimoGetLabelApi;
use Scraper\ScraperColissimo\Model\Credential;
use Scraper\ScraperColissimo\Model\Label\OutputPrintingType;
use Scraper\ScraperColissimo\Request\ColissimoGetLabelRequest;
use Scraper\ScraperColissimo\Tests\ClientTrait;

/**
 * @internal
 */
#[CoversClass(ColissimoGetLabelApi::class)]
#[CoversClass(ColissimoGetLabelRequest::class)]
final class ColissimoGetLabelApiTest extends TestCase
{
    use ClientTrait;

    public function testReprintLabel(): void
    {
        $content = self::multipart('uuid:abc', '{"messages":[{"id":"0","type":"INFOS","messageContent":"OK"}],"labelV2Response":{"parcelNumber":"6A00000000001"}}', ['label' => '^XA^XZ']);
        $client = $this->createClient($content);

        $result = $client->send(new ColissimoGetLabelRequest(Credential::apiKey('key'), '6A00000000001', OutputPrintingType::ZPL_10X15_203DPI));

        $this->assertSame('^XA^XZ', $result->label);
        $this->assertSame('6A00000000001', $result->parcelNumber);
        $this->assertNotNull($this->lastRequest);
        $this->assertSame('https://ws.colissimo.fr/sls-ws/SlsServiceWSRest/3.1/getLabel', $this->lastRequest['url']);
        $this->assertSame('{"parcelNumber":"6A00000000001","outputPrintingType":"ZPL_10x15_203dpi"}', $this->lastRequest['options']['body']);
    }
}
