<?php

namespace Pegas\Gridnine\Xtrip\DOM;

class Communication extends Entity
{
    /**
     * @var string
     */
    protected $sense;

    /**
     * @var string
     */
    protected $type;

    protected function parse()
    {
        $this->sense = $this->parseValue('sense');
        $this->type = $this->parseValue('type');
    }
}
