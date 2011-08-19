<?php

namespace Pegas\Gridnine\Xtrip\DOM;

class SegmentTariff extends Entity
{
    /**
     * @var string
     */
    private $classOfService;

    /**
     * @var string
     */
    private $fareBasis;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $segmentsReferenceList;

    protected function parse()
    {
        $this->classOfService = $this->parseValue('classOfService');
        $this->fareBasis = $this->parseValue('fareBasis');
        $this->segmentsReferenceList = $this->parseReferenceList('segments');
    }

    public function getClassOfService()
    {
        return $this->classOfService;
    }

    public function getCareBasis()
    {
        return $this->fareBasis;
    }

    public function getSegmentsReferenceList()
    {
        return $this->segmentsReferenceList;
    }
}
