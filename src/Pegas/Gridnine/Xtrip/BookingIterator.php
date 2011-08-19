<?php

namespace Pegas\Gridnine\Xtrip;

use DOMDocument;
use DOMXPath;
use Pegas\Gridnine\Xtrip\Reference\Entity as Reference;

class BookingIterator implements \Iterator
{
    private $dom;
    private $xpath;

    private $nodes;
    private $position = 0;

    public function __construct(DOMDocument $dom)
    {
        $this->dom = $dom;
        $this->xpath = new DOMXPath($dom);
        $this->nodes = $this->xpath->query('/export/bookingFiles/bookingFile');
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return new DOM\Booking($this, $this->nodes->item($this->position));
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

    public function getDOMDocument()
    {
        return $this->dom;
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
