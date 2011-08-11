<?php

namespace Pegas\Gridnine;

use DOMElement;

class DOMEntity extends Entity
{
    /**
     * @var \DOMElement
     */
    protected $element;

    /**
     * @param \Pegas\Gridnine\ReferenceManager $referenceManager
     * @param \DOMElement $element
     */
    public function __construct(ReferenceManager $referenceManager, DOMElement $element) {
        $this->element = $element;

        $type = $element->getAttribute('type');
        $uid = $element->getAttribute('uid');

        parent::__construct($referenceManager, $type, $uid);
    }

    /**
     * @param string $name
     * @return null|string
     */
    protected function fetchSingleNode($name) {
        $nodes = $this->element->getElementsByTagName($name);

        if ($nodes->length != 1) {
            return null;
        }

        return $nodes->item(0)->nodeValue;
    }

    /**
     * @param string $name
     * @return null
     */
    protected function fetchReference($name) {
        $nodes = $this->element->getElementsByTagName($name);

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
     * @param string $name
     * @return ReferenceList|null
     */
    protected function fetchReferences($name) {
        $nodes = $this->element->getElementsByTagName($name);

        if ($nodes->length != 1) {
            return null;
        }

        $referenceList = new ReferenceList();

        $arrayNodes = $nodes->item(0)->getElementsByTagName('item');
        foreach ($arrayNodes as $arrayNode) {
            $type = $arrayNode->getAttribute('type');
            $uid = $arrayNode->getAttribute('uid');

            $referenceList->addReference(new Reference($this->referenceManager, $type, $uid));
        }

        return $referenceList;
    }
}
