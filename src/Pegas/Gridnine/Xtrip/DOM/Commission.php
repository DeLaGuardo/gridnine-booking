<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DateTime;

class Commission extends Entity
{
    /**
     * @var string
     */
    private $contractType;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $amountReference;

    /**
     * @var string
     */
    private $equivalentAmount;

    /**
     * @var string
     */
    private $roundingMode;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $commissionPropertiesReference;

    protected function parse()
    {
        $this->contractType = $this->parseValue('contractType');
        $this->equivalentAmount = $this->parseValue('equivalentAmount');
        $this->roundingMode = $this->parseValue('roundingMode');
        $this->amountReference = $this->parseReference('amount');
        $this->commissionPropertiesReference = $this->parseReference('commissionProperties');
    }

    public function getContractType()
    {
        return $this->contractType;
    }

    public function getEquivalentAmount()
    {
        return $this->equivalentAmount;
    }

    public function getRoundingMode()
    {
        return $this->roundingMode;
    }

    public function getAmountReference()
    {
        return $this->amountReference;
    }

    public function getCommissionPropertiesReference()
    {
        return $this->commissionPropertiesReference;
    }
}
