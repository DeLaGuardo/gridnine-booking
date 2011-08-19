<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DOMDocument;
use DOMXPath;
use Pegas\Gridnine\Xtrip\Reference\Entity as Reference;

abstract class Iterator implements \Iterator
{
    private $dom;
    private $xpath;

    /**
     * @var \DOMNodeList
     */
    protected $nodes;
    protected $position = 0;

    public function __construct(DOMDocument $dom)
    {
        $this->dom = $dom;
        $this->xpath = new DOMXPath($dom);
        $this->nodes = $this->getNodeList($this->xpath);
    }

    /**
     * @abstract
     * @param \DOMXPath $xpath
     * @return \DOMNodeList
     */
    abstract protected function getNodeList(DOMXPath $xpath);

    public function rewind()
    {
        $this->position = 0;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function valid()
    {
        return $this->position < $this->nodes->length;
    }

    public function getDOMXpath()
    {
        return $this->xpath;
    }

    public function findEntityNode(Reference $reference)
    {
        return $this->findNode($reference, '/export/entities/entity[@type="%s"][@uid="%s"]');
    }

    public function findDictonaryNode(Reference $reference)
    {
        return $this->findNode($reference, '/export/dictionaries/dictionary[@type="%s"][@uid="%s"]');
    }

    private function findNode(Reference $reference, $query)
    {
        $type = $reference->getType();
        $uid = $reference->getUid();

        $nodes = $this->xpath->query(sprintf($query, $type, $uid));
        return $nodes->item(0);
    }
}
