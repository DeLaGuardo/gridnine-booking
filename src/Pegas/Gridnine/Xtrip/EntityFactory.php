<?php

namespace Pegas\Gridnine\Xtrip;

use Pegas\Gridnine\Xtrip\Reference\Entity as Reference;

class EntityFactory
{
    public static function factory(Reference $reference)
    {
        $iterator = $reference->getIterator();
        $node = $iterator->findEntityNode($reference);

        switch ($reference->getType()) {
            case 'com.gridnine.xtrip.common.model.booking.Customer':
                return new DOM\Customer($iterator, $node);

            case 'com.gridnine.xtrip.common.model.profile.Communication':
                return new DOM\Communication($iterator, $node);

            case 'com.gridnine.xtrip.common.model.profile.Organization':
                return new DOM\Organization($iterator, $node);

            default:
                throw new \RuntimeException();
        }
    }
}
