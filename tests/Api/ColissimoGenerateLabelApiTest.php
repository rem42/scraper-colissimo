<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Tests\Api;

use PHPUnit\Framework\TestCase;
use Scraper\Scraper\Attribute\Scraper;
use Scraper\Scraper\Request\ScraperRequest;
use Scraper\ScraperColissimo\Api\ColissimoGenerateLabelApi;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @internal
 */
class ColissimoGenerateLabelApiTest extends TestCase
{
    public function testOk(): void
    {
        $scraperRequest = $this->createMock(ScraperRequest::class);
        $scraper = new Scraper();

        $responseInterface = $this->createMock(ResponseInterface::class);
        $responseInterface
            ->method('getStatusCode')->willReturn(200);
        $responseInterface
            ->method('getContent')->willReturn("--uuid:9c80b689-ba3d-4c9e-8b30-344b5497b20e\r\nContent-Type: application/json;charset=UTF-8\r\nContent-Transfer-Encoding: binary\r\nContent-ID: <jsonInfos>\r\n\r\n{\"messages\":[{\"id\":\"0\",\"type\":\"INFOS\",\"messageContent\":\"La requête a été traitée avec succès\",\"replacementValues\":[]}],\"labelXmlV2Reponse\":null,\"labelV2Response\":{\"parcelNumber\":\"6A00420042004\",\"parcelNumberPartner\":\"0000000000A0000000000000000V\",\"pdfUrl\":null,\"fields\":null}}\r\n--uuid:9c80b689-ba3d-4c9e-8b30-344b5497b20e--");

        $colissimoGenerateLabelApi = new ColissimoGenerateLabelApi(
            $scraperRequest,
            $scraper,
            $responseInterface
        );

        $result = $colissimoGenerateLabelApi->execute();

        $this->assertCount(1, $result->response->messages);

        $this->assertEquals('6A00420042004', $result->response->labelResponse->parcelNumber);

        $this->assertEquals('0000000000A0000000000000000V', $result->response->labelResponse->parcelNumberPartner);
    }
}
