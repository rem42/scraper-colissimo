<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Api;

use Scraper\ScraperColissimo\Adapter\ColissimoAdapter;
use Scraper\ScraperColissimo\Entity\ColissimoGenerateLabel;
use Scraper\ScraperColissimo\Entity\Response;

final class ColissimoGenerateLabelApi extends ColissimoApi
{
    public function execute(): ColissimoGenerateLabel
    {
        $colissimoAdapter = ColissimoAdapter::execute($this->response);
        /** @var Response $response */
        $response = $this->serializer->deserialize($colissimoAdapter->getJson(), Response::class, 'json');

        $colissimoGenerateLabel           = new ColissimoGenerateLabel();
        $colissimoGenerateLabel->response = $response;
        $colissimoGenerateLabel->file     = $colissimoAdapter->getFile();

        if (!empty($colissimoAdapter->getCn23())) {
            $colissimoGenerateLabel->cn23 = $colissimoAdapter->getCn23();
        }

        return $colissimoGenerateLabel;
    }
}
