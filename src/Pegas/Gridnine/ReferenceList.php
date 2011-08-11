<?php

namespace Pegas\Gridnine;

use ArrayIterator;

class ReferenceList implements \IteratorAggregate, Referenceable
{
    protected $references = array();

    public function addReference(Reference $reference) {
        $this->references[] = $reference;
    }

    public function follow()
    {
        $followed = array();

        foreach ($this->references as $reference) {
            $followed[] = $reference->follow();
        }

        return $followed;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->references);
    }
}
