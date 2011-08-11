<?php

namespace Pegas\Gridnine;

use DOMDocument;
use DOMXPath;

class ReferenceManager {
    /**
     * @var \DOMDocument
     */
    protected $dom;

    /**
     * @var \DOMXPath
     */
    protected $xpath;

    /**
     * @param \DOMDocument $dom
     */
    public function __construct(DOMDocument $dom) {
        $this->dom = $dom;
        $this->xpath = new DOMXPath($dom);
    }

    /**
     * @return \Pegas\Gridnine\BookingFilesIterator
     */
    public function getBookingFiles() {
        $nodes = $this->xpath->query('/export/bookingFiles/bookingFile');
        return new BookingFilesIterator($nodes);
    }
}
