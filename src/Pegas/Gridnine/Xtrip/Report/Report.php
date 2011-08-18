<?php

namespace Pegas\Gridnine\Xtrip\Report;

use Pegas\Gridnine\Xtrip\Formatter\Formatter;

abstract class Report
{
    private $formatter;

    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function setFormatter(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function getFormatter()
    {
        return $this->formatter;
    }

    abstract public function make();
}
