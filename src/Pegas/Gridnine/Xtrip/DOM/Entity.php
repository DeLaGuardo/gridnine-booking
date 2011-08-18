<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DOMNode;
use Pegas\Gridnine\Xtrip\Entity as BaseEntity;
use Pegas\Gridnine\Xtrip\DOM\Iterator;
use Pegas\Gridnine\Xtrip\Reference\Entity as Reference;
use Pegas\Gridnine\Xtrip\Reference\EntityList as ReferenceList;

abstract class Entity extends BaseEntity
{
    private $node;

    public function __construct(Iterator $iterator, DOMNode $node)
    {
        $this->node = $node;

        list($type, $uid) = $this->parseEntityAttributes($node);

        parent::__construct($iterator, $type, $uid);

        $this->parse();
    }

    protected function parseValue($name)
    {
        $node = $this->parseNode($name);
        return $node !== null ? $node->nodeValue : null;
    }

    protected function parseReference($name)
    {
        $node = $this->parseNode($name);

        if ($node === null) {
            return null;
        }

        list($type, $uid) = $this->parseEntityAttributes($node);

        return new Reference($this->getIterator(), $type, $uid);
    }

    protected function parseReferenceList($name)
    {
        $referenceList = new ReferenceList();

        $context = $this->parseNode($name);

        if ($context === null) {
            return $referenceList;
        }

        $nodes = $this->getIterator()->getDOMXpath()->query('./item', $context);

        for ($i = 0; $i < $nodes->length; $i++) {
            $node = $nodes->item($i);

            list($type, $uid) = $this->parseEntityAttributes($node);

            $referenceList->addReference(new Reference($this->getIterator(), $type, $uid));
        }

        return $referenceList;
    }

    protected function parseArray($name)
    {
        $array = array();

        $context = $this->parseNode($name);

        if ($context === null) {
            return array();
        }

        $nodes = $this->getIterator()->getDOMXpath()->query('./item', $context);

        for ($i = 0; $i < $nodes->length; $i++) {
            $array[] = $nodes->item($i)->nodeValue;
        }

        return $array;
    }

    protected function parseBoolean($name)
    {
        return $this->parseValue($name) == 'true';
    }

    private function parseNode($name)
    {
        $nodes = $this->getIterator()->getDOMXpath()->query(sprintf('./%s', $name), $this->node);
        return $nodes->length == 1 ? $nodes->item(0) : null;
    }

    private function parseEntityAttributes(DOMNode $node)
    {
        $type = $node->attributes->getNamedItem('type')->nodeValue;
        $uid = $node->attributes->getNamedItem('uid')->nodeValue;

        return array($type, $uid);
    }

    abstract protected function parse();
}
