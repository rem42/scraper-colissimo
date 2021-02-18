<?php

namespace Scraper\ScraperColissimo\Api;

use Scraper\ScraperColissimo\Adapter\ColissimoAdapter;
use Scraper\ScraperColissimo\Entity\ColissimoGenerateLabel;
use Scraper\ScraperColissimo\Entity\Response;

final class ColissimoGenerateLabelApi extends ColissimoApi
{
    public function execute()
    {
        $colissimoXML = ColissimoAdapter::execute($this->response);
        $response     = $this->serializer->deserialize($colissimoXML->getJson(), Response::class, 'json');

        $colissimoGenerateLabel = new ColissimoGenerateLabel();
        $colissimoGenerateLabel->setResponse($response);
        $colissimoGenerateLabel->setFile($colissimoXML->getFile());

        if (!empty($colissimoXML->getCn23())) {
            $colissimoGenerateLabel->setCn23($colissimoXML->getCn23());
        }

        return $colissimoGenerateLabel;
    }
}
