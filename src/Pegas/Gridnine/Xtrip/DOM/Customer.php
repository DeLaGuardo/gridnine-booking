<?php

namespace Pegas\Gridnine\Xtrip\DOM;

class Customer extends Entity
{
    /**
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    protected $communicationsReferences;

    public function parse()
    {
        $this->communicationsReferences = $this->parseReferenceList('communications');
    }

    public function getCommunications()
    {
        return $this->communicationsReferences->proceed();
    }
}
