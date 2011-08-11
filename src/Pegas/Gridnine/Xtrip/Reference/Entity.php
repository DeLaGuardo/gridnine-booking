<?php

namespace Pegas\Gridnine\Xtrip\Reference;

use Pegas\Gridnine\Xtrip\Entity as BaseEntity;
use Pegas\Gridnine\Xtrip\EntityFactory;

class Entity extends BaseEntity implements Referenceable
{
    private $entity = null;

    public function proceed()
    {
        if ($this->entity === null) {
            $this->entity = EntityFactory::factory($this);
        }

        return $this->entity;
    }
}
