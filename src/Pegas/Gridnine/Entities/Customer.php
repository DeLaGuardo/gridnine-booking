<?php

namespace Pegas\Gridnine\Entities;

use DOMElement;
use Pegas\Gridnine\DOMEntity;
use Pegas\Gridnine\ReferenceManager;

class Customer extends DOMEntity
{
    protected $communicationsReferences;

    public function __construct(ReferenceManager $referenceManager, DOMElement $element) {
        parent::__construct($referenceManager, $element);

        $this->communicationsReferences = $this->fetchReferences('communications');
    }

    public function getCommunications()
    {
        return $this->communicationsReferences->follow();
    }
}
