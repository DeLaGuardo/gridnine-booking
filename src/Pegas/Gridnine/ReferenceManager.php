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
        return new BookingFilesIterator($this, $nodes);
    }

    /**
     * @param \Pegas\Gridnine\Reference $reference
     * @return \DOMNode|null
     */
    public function fetchReference(Reference $reference) {
        $type = $reference->getType();
        $uid = $reference->getUid();

        $nodes = $this->xpath->query('/export/entities/entity[@type="'.$type.'"][@uid="'.$uid.'"]');

        if ($nodes->length != 1) {
            return null;
        }

        return $nodes->item(0);
    }
}
