<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DateTime;

class Reservation extends Entity
{
    /**
     * @var string
     */
    private $bookingFileReference;

    /**
     * @var \DateTime
     */
    private $subagencyReference;

    /**
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $salesPointReference;

    /**
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $recordLocator;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $resDate;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $gdsName;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $bookingAgentDutyCode;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $bookingAgentReference;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $productsReferenceList;

    protected function parse()
    {
        // Basic
        $this->recordLocator = $this->parseValue('recordLocator');
        $this->resDate = new DateTime($this->parseValue('resDate'));
        $this->gdsName = $this->parseValue('gdsName');
        $this->bookingAgentDutyCode = $this->parseValue('bookingAgentDutyCode');

        // References
        $this->bookingFileReference = $this->parseReference('bookingFile');
        $this->subagencyReference = $this->parseReference('subagency');
        $this->salesPointReference = $this->parseReference('salesPoint');
        $this->bookingAgentReference = $this->parseReference('bookingAgent');

        // Arrays of references
        $this->productsReferenceList = $this->parseReferenceList('products');
    }

    public function getRecordLocator()
    {
        return $this->recordLocator;
    }

    public function getResDate()
    {
        return $this->resDate;
    }

    public function getGdsName()
    {
        return $this->gdsName;
    }

    public function getBookingAgentDutyCode()
    {
        return $this->bookingAgentDutyCode;
    }

    public function getBookingFile()
    {
        return $this->bookingFileReference->proceed();
    }

    public function getSubagency()
    {
        return $this->subagencyReference->proceed();
    }

    public function getSalesPoint()
    {
        return $this->salesPointReference;
    }

    public function getBookingAgent()
    {
        return $this->bookingAgentReference;
    }

    public function getProductsReferenceList()
    {
        return $this->productsReferenceList;
    }
}
