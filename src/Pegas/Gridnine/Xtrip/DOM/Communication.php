<?php

namespace Pegas\Gridnine\Xtrip\DOM;

class Communication extends Entity
{
    /**
     * @var string
     */
    private $sense;

    /**
     * @var string
     */
    private $communcationType;

    protected function parse()
    {
        $this->sense = $this->parseValue('sense');
        $this->communcationType = $this->parseValue('type');
    }

    public function getSense()
    {
        return $this->sense;
    }

    public function getCommuncationType()
    {
        return $this->communcationType;
    }
}
