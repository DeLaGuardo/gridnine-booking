<?php

namespace Pegas\Gridnine\Entities;

use DOMElement;
use DateTime;
use Pegas\Gridnine\Entity;
use Pegas\Gridnine\ReferenceManager;
use Pegas\Gridnine\Reference;

class BookingFile extends Entity
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
        // Entity data
        $type = $element->getAttribute('type');
        $uid = $element->getAttribute('uid');

        parent::__construct($referenceManager, $type, $uid);

        // Basic
        $this->number = $this->fetchSingleNode($element, 'number');
        $this->createdAt = new DateTime($this->fetchSingleNode($element, 'createDate'));

        // References
        $this->customerReference = $this->fetchReference($element, 'customer');
        $this->customerProfileReference = $this->fetchReference($element, 'customerProfile');
        $this->agencyReference = $this->fetchReference($element, 'agency');

        // Arrays of references
        $this->travellersReferences = $this->fetchReferences($element, 'travellers');
        $this->reservationsReferences = $this->fetchReferences($element, 'reservations');
        $this->appliedRulesReferences = $this->fetchReferences($element, 'appliedRules');
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
    public function getCustomerReference()
    {
        return $this->customerReference;
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
    private function fetchReference(DOMElement $element, $name) {
        $nodes = $element->getElementsByTagName($name);

        if ($nodes->length != 1) {
            return null;
        }

        $node = $nodes->item(0);
        $type = $node->getAttribute('type');
        $uid = $node->getAttribute('uid');

        $reference = new Reference($this->referenceManager, $type, $uid);

        return $reference;
    }

    /**
     * @param \DOMElement $element
     * @param string $name
     * @return array|null
     */
    private function fetchReferences(DOMElement $element, $name) {
        $nodes = $element->getElementsByTagName($name);

        if ($nodes->length != 1) {
            return null;
        }

        $references = array();

        $arrayNodes = $nodes->item(0)->getElementsByTagName('item');
        foreach ($arrayNodes as $arrayNode) {
            $type = $arrayNode->getAttribute('type');
            $uid = $arrayNode->getAttribute('uid');

            $references[] = new Reference($this->referenceManager, $type, $uid);
        }

        return $references;
    }
}
