<?php

namespace Pegas\Gridnine;

interface Referenceable
{
    /**
     * @abstract
     * @return \Pegas\Gridnine\Entity
     */
    public function follow();
}
