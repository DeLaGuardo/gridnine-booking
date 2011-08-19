<?php

namespace Pegas\Gridnine\Xtrip;

use Pegas\Gridnine\Xtrip\Reference\Entity as Reference;

class EntityFactory
{
    public static function factory(Reference $reference)
    {
        $bookingIterator = $reference->getBookingIterator();

        switch ($reference->getType()) {
            case 'com.gridnine.xtrip.common.model.booking.Customer':
                $node = $bookingIterator->findEntityNode($reference);
                return new DOM\Customer($bookingIterator, $node);

            case 'com.gridnine.xtrip.common.model.booking.Customer':
                $node = $bookingIterator->findEntityNode($reference);
                return new DOM\Customer($bookingIterator, $node);

            case 'com.gridnine.xtrip.common.model.profile.Communication':
                $node = $bookingIterator->findEntityNode($reference);
                return new DOM\Communication($bookingIterator, $node);

            case 'com.gridnine.xtrip.common.model.profile.Organization':
                $node = $bookingIterator->findEntityNode($reference);
                return new DOM\Organization($bookingIterator, $node);

            case 'com.gridnine.xtrip.common.model.dict.Airline':
                $node = $bookingIterator->findEntityNode($reference);
                return new DOM\Organization($bookingIterator, $node);

            default:
                throw new \RuntimeException();
        }
    }
}
