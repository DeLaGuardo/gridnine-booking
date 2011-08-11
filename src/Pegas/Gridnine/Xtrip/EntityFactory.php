<?php

namespace Pegas\Gridnine\Xtrip;

use Pegas\Gridnine\Xtrip\Reference\Entity as Reference;

class EntityFactory
{
    public static function factory(Reference $reference)
    {
        $bookingIterator = $reference->getBookingIterator();
        $node = $bookingIterator->findEntityNode($reference);

        switch ($reference->getType()) {
            case 'com.gridnine.xtrip.common.model.booking.Customer':
                return new DOM\Customer($bookingIterator, $node);

            case 'com.gridnine.xtrip.common.model.profile.Communication':
                return new DOM\Communication($bookingIterator, $node);

            default:
                throw new \RuntimeException();
        }
    }
}
