<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class outputFormat
 * @package Scraper\ScraperColissimo\Soap
 */
class OutputFormat
{
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $ZPL_10X15_203DPI = "ZPL_10x15_203dpi";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $ZPL_10X15_300DPI = "ZPL_10x15_300dpi";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $DPL_10X15_203DPI = "DPL_10x15_203dpi";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $DPL_10X15_300DPI = "DPL_10x15_300dpi";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $PDF_10X15_300DPI = "PDF_10x15_300dpi";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $PDF_A4_300DPI = "PDF_A4_300dpi";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $RETURNTYPE_SENDPDFBYMAIL = "SendPDFByMail";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $RETURNTYPE_SENDPDFLINKBYMAIL = "SendPDFLinkByMail";
	/**
	 * @var integer
	 * @Serializer\Type("integer")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("x")
	 */
	protected $x = 0;
	/**
	 * @var integer
	 * @Serializer\Type("integer")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("y")
	 */
	protected $y = 0;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("outputPrintingType")
	 */
	protected $outputPrintingType;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("returnType")
	 */
	protected $returnType;

	/**
	 * @return string
	 */
	public function getOutputPrintingType(): ?string
	{
		return $this->outputPrintingType;
	}

	/**
	 * @param string $outputPrintingType
	 *
	 * @return $this
	 */
	public function setOutputPrintingType(?string $outputPrintingType)
	{
		$this->outputPrintingType = $outputPrintingType;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getReturnType(): ?string
	{
		return $this->returnType;
	}

	/**
	 * @param string $returnType
	 *
	 * @return $this
	 */
	public function setReturnType(?string $returnType)
	{
		$this->returnType = $returnType;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getX(): ?int
	{
		return $this->x;
	}

	/**
	 * @param int $x
	 *
	 * @return $this
	 */
	public function setX(?int $x)
	{
		$this->x = $x;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getY(): ?int
	{
		return $this->y;
	}

	/**
	 * @param int $y
	 *
	 * @return $this
	 */
	public function setY(?int $y)
	{
		$this->y = $y;
		return $this;
	}
}
