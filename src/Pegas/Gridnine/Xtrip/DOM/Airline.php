<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DateTime;

class Airline extends Entity
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $modified;

    /**
     * @var string
     */
    private $createdBy;

    /**
     * @var string
     */
    private $modifiedBy;

    /**
     * @var array
     */
    private $codeVariants;

    /**
     * @var array
     */
    private $translations;

    /**
     * @var string
     */
    private $airlineNumber;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $country;

    protected function parse()
    {
        //strings
        $this->code = $this->parseValue('code');
        $this->createdBy = $this->parseValue('createdBy');
        $this->modifiedBy = $this->parseValue('modifiedBy');
        $this->airlineNumber = $this->parseValue('airlineNumber');

        //Date
        $this->created = new DateTime($this->parseValue('created'));
        $this->modified = new DateTime($this->parseValue('modified'));

        // Arrays
        $this->codeVariants = $this->parseArray('codeVariants');
        $this->translations = $this->parseArray('translations');

        // References
        $this->countryReference = $this->parseReference('country');
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    public function getAirlineNumber()
    {
        return $this->airlineNumber;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function getCodeVariants()
    {
        return $this->codeVariants;
    }

    public function getTranslations()
    {
        return $this->translations;
    }

    public function getCountryReference()
    {
        return $this->countryReference;
    }
}
