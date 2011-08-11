<?php

namespace Pegas\Gridnine;

use DOMNodeList;

class BookingFilesIterator implements \Iterator
{
    /**
     * @var \Pegas\Gridnine\ReferenceManager
     */
    protected $referenceManager;

    /**
     * @var \DOMNodeList
     */
    protected $nodeList;

    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @var \Pegas\Gridnine\BookingFile
     */
    private $currentBookingFile;

    /**
     * @param \Pegas\Gridnine\ReferenceManager $referenceManager
     * @param \DOMNodeList $nodeList
     */
    public function __construct(ReferenceManager $referenceManager, DOMNodeList $nodeList) {
        $this->referenceManager = $referenceManager;
        $this->nodeList = $nodeList;

        if ($nodeList->length > 0) {
            $this->currentBookingFile = new Entities\BookingFile($referenceManager, $nodeList->item(0));
        }
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->currentBookingFile;
    }

    public function key()
    {
        return $this->currentBookingFile->getUid();
    }

    public function next()
    {
        $this->position++;

        if ($this->valid()) {
            $this->currentBookingFile = new Entities\BookingFile($this->referenceManager, $this->nodeList->item($this->position));
        }
    }

    public function valid()
    {
        return $this->position < $this->nodeList->length;
    }
}
