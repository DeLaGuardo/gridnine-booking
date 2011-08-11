<?php

namespace Pegas\Gridnine\Entities;

use DOMElement;
use Pegas\Gridnine\DOMEntity;
use Pegas\Gridnine\ReferenceManager;

class Communication extends DOMEntity
{
    /**
     * @var null|string
     */
    protected $sense;

    /**
     * @var null|string
     */
    protected $type;

    /**
     * @param \Pegas\Gridnine\ReferenceManager $referenceManager
     * @param \DOMElement $element
     */
    public function __construct(ReferenceManager $referenceManager, DOMElement $element) {
        parent::__construct($referenceManager, $element);

        $this->sense = $this->fetchSingleNode('sense');
        $this->type = $this->fetchSingleNode('type');
    }
}
