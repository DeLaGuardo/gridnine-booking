<?php

namespace Pegas\Gridnine;

abstract class Entity
{
    /**
     * @var \Pegas\Gridnine\ReferenceManager
     */
    protected $referenceManager;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $uid;

    /**
     * @param \Pegas\Gridnine\ReferenceManager $referenceManager
     * @param string $type
     * @param string $uid
     */
    public function __construct(ReferenceManager $referenceManager, $type, $uid) {
        $this->referenceManager = $referenceManager;
        $this->type = $type;
        $this->uid = $uid;
    }

    /**
     * @return \Pegas\Gridnine\ReferenceManager
     */
    public function getReferenceManager()
    {
        return $this->referenceManager;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }
}
