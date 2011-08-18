<?php

namespace Pegas\Gridnine\Xtrip;

use Pegas\Gridnine\Xtrip\DOM\Iterator;

abstract class Entity
{
    private $iterator;
    private $type;
    private $uid;

    public function __construct(Iterator $iterator, $type, $uid)
    {
        $this->iterator = $iterator;
        $this->type = $type;
        $this->uid = $uid;
    }

    public function getIterator()
    {
        return $this->iterator;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getUid()
    {
        return $this->uid;
    }
}
