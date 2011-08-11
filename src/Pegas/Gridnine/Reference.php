<?php

namespace Pegas\Gridnine;

class Reference extends Entity
{
    public function getObject()
    {
        return $this->getReferenceManager()->fetchReference($this);
    }
}
