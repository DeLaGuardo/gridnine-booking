<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DateTime;

class Money extends Entity
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $currency;

    protected function parse()
    {
        $this->value = $this->parseValue('value');
        $this->currency = $this->parseValue('currency');
    }

    public function getvalue()
    {
        return $this->value;
    }
    public function getcurrency()
    {
        return $this->currency;
    }
}
