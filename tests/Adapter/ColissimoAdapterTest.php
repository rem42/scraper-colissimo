<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Tests\Adapter;

use PHPUnit\Framework\TestCase;
use Scraper\ScraperColissimo\Adapter\ColissimoAdapter;
use Scraper\ScraperColissimo\Exception\ColissimoResponseException;
use Scraper\ScraperColissimo\Exception\ColissimoResponseUnknownException;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @internal
 */
class ColissimoAdapterTest extends TestCase
{
    public function testWithWrongResponseHttpCodeAndEmptyResponse(): void
    {
        $responseInterface = $this->createMock(ResponseInterface::class);
        $responseInterface
            ->method('getStatusCode')->willReturn(500)
        ;
        $responseInterface
            ->method('getContent')->willReturn('')
        ;

        $this->expectException(ColissimoResponseUnknownException::class);

        ColissimoAdapter::execute($responseInterface);
    }

    public function testWithWrongResponseHttpCode(): void
    {
        $responseInterface = $this->createMock(ResponseInterface::class);
        $responseInterface
            ->method('getStatusCode')->willReturn(400)
        ;
        $responseInterface
            ->method('getContent')->willReturn("--uuid:30e51902-2f92-468a-8f40-5205346bc00e\r\nContent-Type: application/json;charset=UTF-8\r\nContent-Transfer-Encoding: binary\r\nContent-ID: <jsonInfos>\r\n\r\n{\"messages\":[{\"id\":\"50005\",\"type\":\"ERROR\",\"messageContent\":\"le champ letter.service.depositDate ne peut pas être nul\",\"replacementValues\":[]}],\"labelXmlV2Reponse\":null,\"labelV2Response\":null}\r\n--uuid:30e51902-2f92-468a-8f40-5205346bc00e--")
        ;

        $this->expectException(ColissimoResponseException::class);
        $this->expectExceptionMessage('Colissimo request error: le champ letter.service.depositDate ne peut pas être nul');

        ColissimoAdapter::execute($responseInterface);
    }

    public function testOk(): void
    {
        $responseInterface = $this->createMock(ResponseInterface::class);
        $responseInterface
            ->method('getStatusCode')->willReturn(200)
        ;
        $responseInterface
            ->method('getContent')->willReturn("--uuid:9c80b689-ba3d-4c9e-8b30-344b5497b20e\r\nContent-Type: application/json;charset=UTF-8\r\nContent-Transfer-Encoding: binary\r\nContent-ID: <jsonInfos>\r\n\r\n{\"messages\":[{\"id\":\"0\",\"type\":\"INFOS\",\"messageContent\":\"La requête a été traitée avec succès\",\"replacementValues\":[]}],\"labelXmlV2Reponse\":null,\"labelV2Response\":{\"parcelNumber\":\"6A20552612148\",\"parcelNumberPartner\":\"0074570116A2055261214801250V\",\"pdfUrl\":null,\"fields\":null}}\r\n--uuid:9c80b689-ba3d-4c9e-8b30-344b5497b20e--")
        ;

        $result = ColissimoAdapter::execute($responseInterface);

        $this->assertNotEmpty($result->getJson());
    }
}
