<?php

namespace Pegas\Gridnine;

use DOMNodeList;

class BookingFilesIterator implements \Iterator
{
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
     * @param \DOMNodeList $nodeList
     */
    public function __construct(DOMNodeList $nodeList) {
        $this->nodeList = $nodeList;

        if ($nodeList->length > 0) {
            $this->currentBookingFile = new BookingFile($nodeList->item(0));
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
            $this->currentBookingFile = new BookingFile($this->nodeList->item($this->position));
        }
    }

    public function valid()
    {
        return $this->position < $this->nodeList->length;
    }
}
