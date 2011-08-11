<?php

namespace Pegas\Gridnine;

use DOMElement;
use DateTime;

class BookingFile
{
    /**
     * @var string
     */
    protected $uid;

    /**
     * @var null|string
     */
    protected $number;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var null|string
     */
    protected $customerUid;

    /**
     * @var null|string
     */
    protected $customerProfileUid;

    /**
     * @var null|string
     */
    protected $agencyUid;

    /**
     * @var array|null
     */
    protected $travellersUids = array();

    /**
     * @var array|null
     */
    protected $reservationsUids = array();

    /**
     * @var array|null
     */
    protected $appliedRulesUids = array();

    /**
     * @param \DOMElement $element
     */
    public function __construct(DOMElement $element) {
        // Basic
        $this->uid = $element->getAttribute('uid');
        $this->number = $this->fetchSingleNode($element, 'number');
        $this->createdAt = new DateTime($this->fetchSingleNode($element, 'createDate'));

        // References
        $this->customerUid = $this->fetchReferenceUid($element, 'customer');
        $this->customerProfileUid = $this->fetchReferenceUid($element, 'customerProfile');
        $this->agencyUid = $this->fetchReferenceUid($element, 'agency');

        // Arrays of references
        $this->travellersUids = $this->fetchArrayOfReferenceUids($element, 'travellers');
        $this->reservationsUids = $this->fetchArrayOfReferenceUids($element, 'reservations');
        $this->appliedRulesUids = $this->fetchArrayOfReferenceUids($element, 'appliedRules');
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
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
    public function getCustomerUid()
    {
        return $this->customerUid;
    }

    /**
     * @return null|string
     */
    public function getCustomerProfileUid()
    {
        return $this->customerProfileUid;
    }

    /**
     * @return null|string
     */
    public function getAgencyUid()
    {
        return $this->agencyUid;
    }

    /**
     * @return array|null
     */
    public function getTravellersUids()
    {
        return $this->travellersUids;
    }

    /**
     * @return array|null
     */
    public function getReservationsUids()
    {
        return $this->reservationsUids;
    }

    /**
     * @return array|null
     */
    public function getAppliedRulesUids()
    {
        return $this->appliedRulesUids;
    }

    /**
     * @param \DOMElement $element
     * @param string $name
     * @return null|string
     */
    private function fetchSingleNode(DOMElement $element, $name) {
        $nodes = $element->getElementsByTagName($name);

        if ($nodes->length != 1) {
            return null;
        }

        return $nodes->item(0)->nodeValue;
    }

    /**
     * @param \DOMElement $element
     * @param string $name
     * @return null
     */
    private function fetchReferenceUid(DOMElement $element, $name) {
        $nodes = $element->getElementsByTagName($name);

        if ($nodes->length != 1) {
            return null;
        }

        return $nodes->item(0)->getAttribute('uid');
    }

    /**
     * @param \DOMElement $element
     * @param string $name
     * @return array|null
     */
    private function fetchArrayOfReferenceUids(DOMElement $element, $name) {
        $nodes = $element->getElementsByTagName($name);

        if ($nodes->length != 1) {
            return null;
        }

        $result = array();

        $arrayNodes = $nodes->item(0)->getElementsByTagName('item');
        foreach ($arrayNodes as $arrayNode) {
            $result[] = $arrayNode->getAttribute('uid');
        }

        return $result;
    }
}
