<?php

namespace Pegas\Gridnine\Xtrip;

use Pegas\Gridnine\Xtrip\Reference\Entity as Reference;

class EntityFactory
{
    public static function factory(Reference $reference)
    {
        $iterator = $reference->getIterator();

        switch ($reference->getType()) {
            case 'com.gridnine.xtrip.common.model.booking.Customer':
                $node = $iterator->findEntityNode($reference);
                return new DOM\Customer($iterator, $node);

            case 'com.gridnine.xtrip.common.model.booking.Customer':
                $node = $iterator->findEntityNode($reference);
                return new DOM\Customer($iterator, $node);

            case 'com.gridnine.xtrip.common.model.profile.Communication':
                $node = $iterator->findEntityNode($reference);
                return new DOM\Communication($iterator, $node);

            case 'com.gridnine.xtrip.common.model.profile.Organization':
                $node = $iterator->findEntityNode($reference);
                return new DOM\Organization($iterator, $node);

            case 'com.gridnine.xtrip.common.model.dict.Airline':
                $node = $iterator->findEntityNode($reference);
                return new DOM\Organization($iterator, $node);

            default:
                throw new \RuntimeException();
        }
    }
}
