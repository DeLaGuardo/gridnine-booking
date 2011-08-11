<?php

namespace Pegas\Gridnine;

class Reference extends Entity implements Referenceable
{
    protected $followed = null;

    public function follow()
    {
        if ($this->followed === null) {
            $this->followed = $this->getReferenceManager()->fetchReference($this);
        }

        return $this->followed;
    }
}
