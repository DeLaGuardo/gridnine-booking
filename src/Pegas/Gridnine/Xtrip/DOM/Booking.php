<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DateTime;

class Booking extends Entity
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $customerReference;

    /**
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $customerProfileReference;

    /**
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $agencyReference;

    /**
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $travellersReferenceList;

    /**
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $reservationsReferenceList;

    /**
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $appliedRulesReferenceList;

    protected function parse()
    {
        // Basic
        $this->number = $this->parseValue('number');
        $this->createdAt = new DateTime($this->parseValue('createDate'));

        // References
        $this->customerReference = $this->parseReference('customer');
        $this->customerProfileReference = $this->parseReference('customerProfile');
        $this->agencyReference = $this->parseReference('agency');

        // Arrays of references
        $this->travellersReferenceList = $this->parseReferenceList('travellers');
        $this->reservationsReferenceList = $this->parseReferenceList('reservations');
        $this->appliedRulesReferenceList = $this->parseReferenceList('appliedRules');
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getCustomer()
    {
        return $this->customerReference->proceed();
    }

    public function getCustomerProfile()
    {
        return $this->customerProfileReference->proceed();
    }

    public function getAgencyReference()
    {
        return $this->agencyReference;
    }

    public function getTravellersReferenceList()
    {
        return $this->travellersReferenceList;
    }

    public function getReservationsReferenceList()
    {
        return $this->reservationsReferenceList;
    }

    public function getAppliedRulesReferenceList()
    {
        return $this->appliedRulesReferenceList;
    }
}
