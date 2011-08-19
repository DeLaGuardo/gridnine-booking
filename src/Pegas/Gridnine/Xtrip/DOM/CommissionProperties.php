<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DateTime;

class CommissionProperties extends Entity
{
    /**
     * @var string
     */
    private $roundingMode;

    /**
     * @var string
     */
    private $displayName;

    /**
     * @var boolean
     */
    private $rate;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $categoryReference;

    /**
     * @var boolean
     */
    private $segmentCalculation;

    /**
     * @var boolean
     */
    private $bspCommission;

    /**
     * @var boolean
     */
    private $bonus;

    /**
     * @var boolean
     */
    private $minimum;

    protected function parse()
    {
        // boolean
        $this->rate = $this->parseBoolean('rate');
        $this->segmentCalculation = $this->parseBoolean('segmentCalculation');
        $this->bspCommission = $this->parseBoolean('bspCommission');
        $this->bonus = $this->parseBoolean('bonus');
        $this->minimum = $this->parseBoolean('minimum');

        //strings
        $this->roundingMode = $this->parseValue('roundingMode');
        $this->displayName = $this->parseValue('displayName');

        // References
        $this->categoryReference = $this->parseReference('category');
    }

    public function isRate()
    {
        return $this->rate;
    }

    public function isSegmentCalculation()
    {
        return $this->contractRulesApplied;
    }

    public function isBspCommission()
    {
        return $this->bspCommission;
    }

    public function isBonus()
    {
        return $this->bonus;
    }

    public function isMinimum()
    {
        return $this->minimum;
    }

    public function getRoundingMode()
    {
        return $this->roundingMode;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function getCategoryReference()
    {
        return $this->categoryReference;
    }
}
