<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Fields
 */
class Fields
{
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Field")
     * @Serializer\SerializedName("field")
     */
    protected Field $field;

    /**
     * Body constructor.
     */
    public function __construct()
    {
        $this->field = new Field();
    }

    public function getField(): ?Field
    {
        return $this->field;
    }
}
