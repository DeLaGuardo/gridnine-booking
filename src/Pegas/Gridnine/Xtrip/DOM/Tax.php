<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DateTime;

class Tax extends Entity
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $equivalentAmount;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $amountReference;

    protected function parse()
    {
        $this->code = $this->parseValue('code');
        $this->equivalentAmount = $this->parseValue('equivalentAmount');
        $this->amountReference = $this->parseReference('amount');
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getEquivalentAmount()
    {
        return $this->equivalentAmount;
    }

    public function getAmountReference()
    {
        return $this->amountReference;
    }
}
