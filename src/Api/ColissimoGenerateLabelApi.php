<?php

namespace Scraper\ScraperColissimo\Api;

use Scraper\ScraperColissimo\Adapter\ColissimoAdapter;
use Scraper\ScraperColissimo\Entity\ColissimoGenerateLabel;
use Scraper\ScraperColissimo\Entity\Response;

final class ColissimoGenerateLabelApi extends ColissimoApi
{
    public function execute()
    {
        $colissimoAdapter = ColissimoAdapter::execute($this->response);
        $response         = $this->serializer->deserialize($colissimoAdapter->getJson(), Response::class, 'json');

        $colissimoGenerateLabel = new ColissimoGenerateLabel();
        $colissimoGenerateLabel->setResponse($response);
        $colissimoGenerateLabel->setFile($colissimoAdapter->getFile());

        if (!empty($colissimoAdapter->getCn23())) {
            $colissimoGenerateLabel->setCn23($colissimoAdapter->getCn23());
        }

        return $colissimoGenerateLabel;
    }
}
