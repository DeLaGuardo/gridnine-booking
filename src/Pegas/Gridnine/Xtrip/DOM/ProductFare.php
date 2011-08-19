<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DateTime;

class ProductFare extends Entity
{
    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $segmentTariffReference;

    /**
     * @var string
     */
    private $nucFare;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $baseFareReference;

    protected function parse()
    {
        $this->nucFare = $this->parseValue('nucFare');
        $this->segmentTariffReference = $this->parseReference('segmentTariff');
        $this->baseFareReference = $this->parseReference('baseFare');
    }

    public function getNucFare()
    {
        return $this->nucFare;
    }

    public function getSegmentTariffReference()
    {
        return $this->segmentTariffReference;
    }

    public function getBaseFareReference()
    {
        return $this->baseFareReferencee;
    }
}
