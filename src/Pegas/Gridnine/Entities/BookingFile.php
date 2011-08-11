<?php

namespace Pegas\Gridnine\Entities;

use DOMElement;
use DateTime;
use Pegas\Gridnine\DOMEntity;
use Pegas\Gridnine\ReferenceManager;
use Pegas\Gridnine\Reference;

class BookingFile extends DOMEntity
{
    /**
     * @var \Pegas\Gridnine\ReferenceManager
     */
    protected $referenceManager;

    /**
     * @var null|string
     */
    protected $number;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var null|\Pegas\Gridnine\Reference
     */
    protected $customerReference;

    /**
     * @var null|\Pegas\Gridnine\Reference
     */
    protected $customerProfileReference;

    /**
     * @var null|\Pegas\Gridnine\Reference
     */
    protected $agencyReference;

    /**
     * @var array|null
     */
    protected $travellersReferences = array();

    /**
     * @var array|null
     */
    protected $reservationsReferences = array();

    /**
     * @var array|null
     */
    protected $appliedRulesReferences = array();

    /**
     * @param \Pegas\Gridnine\ReferenceManager $referenceManager
     * @param \DOMElement $element
     */
    public function __construct(ReferenceManager $referenceManager, DOMElement $element) {
        parent::__construct($referenceManager, $element);

        // Basic
        $this->number = $this->fetchSingleNode('number');
        $this->createdAt = new DateTime($this->fetchSingleNode('createDate'));

        // References
        $this->customerReference = $this->fetchReference('customer');
        $this->customerProfileReference = $this->fetchReference('customerProfile');
        $this->agencyReference = $this->fetchReference('agency');

        // Arrays of references
        $this->travellersReferences = $this->fetchReferences('travellers');
        $this->reservationsReferences = $this->fetchReferences('reservations');
        $this->appliedRulesReferences = $this->fetchReferences('appliedRules');
    }

    /**
     * @return null|string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return null|string
     */
    public function getCustomer()
    {
        return $this->customerReference->follow();
    }

    /**
     * @return null|string
     */
    public function getCustomerProfileReference()
    {
        return $this->customerProfileReference;
    }

    /**
     * @return null|string
     */
    public function getAgencyReference()
    {
        return $this->agencyReference;
    }

    /**
     * @return array|null
     */
    public function getTravellersReferences()
    {
        return $this->travellersReferences;
    }

    /**
     * @return array|null
     */
    public function getReservationsReferences()
    {
        return $this->reservationsReferences;
    }

    /**
     * @return array|null
     */
    public function getAppliedRulesReferences()
    {
        return $this->appliedRulesReferences;
    }
}
