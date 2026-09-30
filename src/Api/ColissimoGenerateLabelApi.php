<?php

declare(strict_types=1);

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
        $response = $this->serializer->deserialize($colissimoAdapter->json, Response::class, 'json');

        $colissimoGenerateLabel = new ColissimoGenerateLabel();
        $colissimoGenerateLabel->response = $response;
        $colissimoGenerateLabel->file = $colissimoAdapter->file;

        if (!empty($colissimoAdapter->cn23)) {
            $colissimoGenerateLabel->cn23 = $colissimoAdapter->cn23;
        }

        return $colissimoGenerateLabel;
    }
}
