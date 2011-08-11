<?php

namespace Pegas\Gridnine;

use DOMElement;

class EntityFactory
{
    public static function factory(Reference $reference, DOMElement $element)
    {
        switch ($reference->getType()) {
            case 'com.gridnine.xtrip.common.model.booking.Customer':
                return new Entities\Customer($reference->getReferenceManager(), $element);
                break;
            case 'com.gridnine.xtrip.common.model.profile.Communication':
                return new Entities\Communication($reference->getReferenceManager(), $element);
                break;
        }
    }
}
