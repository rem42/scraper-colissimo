<?php

namespace Scraper\ScraperColissimo\ContentType;

use Scraper\Scraper\ContentType\ContentType;
use Scraper\ScraperColissimo\Entity\ColissimoXML;

class ColissimoXMLContentType extends ContentType
{
	const CONTENT = 'Content-';

	public function execute()
	{
		$content      = $this->response->getBody()->getContents();
		$colissimoXML = new ColissimoXML();

		if (preg_match_all('/--uuid:/', $content, $matches, PREG_OFFSET_CAPTURE)) {
			$result = [];
			for ($i = 0; $i < count($matches [0]) - 1; $i++) {
				if ($i + 1 < count($matches [0])) {
					$result [$i] = substr($content, $matches [0] [$i] [1],
						$matches [0] [$i + 1] [1] - $matches [0] [$i] [1]);
				} else {
					$result [$i] = substr($content, $matches [0] [$i] [1],
						strlen($content));
				}
			}
			$resultSize = sizeof($result);
			$i          = 1;
			foreach ($result as $item) {
				$header = $this->extractHeader($item);
				if (sizeof($header) > 0) {
					if (strpos($header['Content-Type'], 'type="text/xml"') !== FALSE) {
						$colissimoXML->setXml(trim(substr($item, $header['offsetEnd'])));
					} elseif ($i == 3) {
						$colissimoXML->setCn23(trim(substr($item, $header['offsetEnd'])));
					} else {
						$colissimoXML->setFile(trim(substr($item, $header['offsetEnd'])));
					}
				}
				$i++;
			}

		}

		return $colissimoXML;
	}

	/**
	 * Exclude the header from the Web Service response
	 *
	 * @param string $part
	 *
	 * @return array $header
	 */
	private function extractHeader($part)
	{
		$header          = [];
		$headerLineStart = strpos($part, self::CONTENT, 0);
		$endLine         = 0;
		while ($headerLineStart !== FALSE) {
			$header['offsetStart']  = $headerLineStart;
			$endLine                = strpos($part, "\r\n", $headerLineStart);
			$headerLine             = explode(': ', substr($part, $headerLineStart,
				$endLine - $headerLineStart));
			$header[$headerLine[0]] = $headerLine[1];
			$headerLineStart        = strpos($part, self::CONTENT, $endLine);
		}
		$header['offsetEnd'] = $endLine;
		return $header;
	}
}
