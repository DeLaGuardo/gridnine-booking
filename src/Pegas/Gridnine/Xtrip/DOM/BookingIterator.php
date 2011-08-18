<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DOMXPath;

class BookingIterator extends Iterator
{
    protected function getNodeList(DOMXPath $xpath)
    {
        return $xpath->query('/export/bookingFiles/bookingFile');
    }

    public function current()
    {
        return new Booking($this, $this->nodes->item($this->position));
    }
}
