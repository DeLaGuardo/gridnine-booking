<?php

namespace Pegas\Gridnine\Xtrip\Report;

use Pegas\Gridnine\Xtrip\DOM\Booking;
use Pegas\Gridnine\Xtrip\DOM\BookingIterator;
use Pegas\Gridnine\Xtrip\Formatter\Formatter;

abstract class BookingBasedReport extends Report
{
    private $bookingIterator;

    public function __construct(BookingIterator $bookingIterator, Formatter $formatter)
    {
        parent::__construct($formatter);

        $this->bookingIterator = $bookingIterator;
    }

    public function setBookingIterator($bookingIterator)
    {
        $this->bookingIterator = $bookingIterator;
    }

    public function getBookingIterator()
    {
        return $this->bookingIterator;
    }

    public function make()
    {
        $formatter = $this->getFormatter();

        $headers = $this->makeHeaders();
        if (is_array($headers)) {
            $formatter->addHeaders($headers);
        }

        foreach ($this->bookingIterator as $booking) {
            $formatter->addRow($this->makeBooking($booking));
        }
    }

    /**
     * @abstract
     * @return array
     */
    abstract protected function makeHeaders();

    /**
     * @abstract
     * @param \Pegas\Gridnine\Xtrip\DOM\Booking $booking
     * @return array
     */
    abstract protected function makeBooking(Booking $booking);
}
