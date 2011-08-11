<?php

namespace Pegas\Gridnine\Xtrip;

abstract class Entity
{
    private $bookingIterator;
    private $type;
    private $uid;

    public function __construct(BookingIterator $bookingIterator, $type, $uid)
    {
        $this->bookingIterator = $bookingIterator;
        $this->type = $type;
        $this->uid = $uid;
    }

    public function getBookingIterator()
    {
        return $this->bookingIterator;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getUid()
    {
        return $this->uid;
    }
}
