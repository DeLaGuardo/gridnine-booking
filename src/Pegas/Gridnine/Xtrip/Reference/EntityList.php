<?php

namespace Pegas\Gridnine\Xtrip\Reference;

use ArrayIterator;
use Pegas\Gridnine\Xtrip\Reference\Entity as Reference;

class EntityList implements \IteratorAggregate, Referenceable
{
    /**
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity[]
     */
    private $references = array();

    public function addReference(Reference $reference)
    {
        $this->references[] = $reference;
    }

    public function proceed()
    {
        $entities = array();

        foreach ($this->references as $reference) {
            $entities[] = $reference->proceed();
        }

        return $entities;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->references);
    }
}
