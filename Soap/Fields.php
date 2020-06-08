<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Fields
 */
class Fields
{
    /**
     * @var Field
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Field")
     * @Serializer\SerializedName("field")
     */
    protected $field;

    /**
     * Body constructor.
     */
    public function __construct()
    {
        $this->field = new Field();
    }

    /**
     * @return Field
     */
    public function getField(): ?Field
    {
        return $this->field;
    }

    /**
     * @param Field $field
     *
     * @return $this
     */
    public function setField(?Field $field)
    {
        $this->field = $field;
        return $this;
    }
}
