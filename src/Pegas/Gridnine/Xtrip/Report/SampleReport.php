<?php

namespace Pegas\Gridnine\Xtrip\Report;

use Pegas\Gridnine\Xtrip\DOM\Booking;
use Pegas\Gridnine\Xtrip\DOM\BookingIterator;
use Pegas\Gridnine\Xtrip\Formatter\Formatter;

class SampleReport extends BookingBasedReport
{
    protected function makeHeaders()
    {
        return array('Number', 'UID');
    }

    protected function makeBooking(Booking $booking)
    {
        return array($booking->getNumber(), $booking->getUid());
    }
}
