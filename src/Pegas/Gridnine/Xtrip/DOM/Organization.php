<?php

namespace Pegas\Gridnine\Xtrip\DOM;

class Organization extends Entity
{
    /**
     * @var boolean
     */
    private $active;

    /**
     * @var boolean
     */
    private $disable;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @todo
     */
    private $legalForm;

    /**
     * @var string
     */
    private $registrationId;

    /**
     * @var string
     */
    private $kpp;

    /**
     * @var string
     */
    private $okpoCode;

    /**
     * @var boolean
     */
    private $foreign;

    /**
     * @var boolean
     */
    private $simpleTaxed;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $financeDocumentPropertiesReference;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $financeRestrictionsReference;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var array
     */
    private $types;

    protected function parse()
    {
        $this->active = $this->parseBoolean('active');
        $this->disable = $this->parseBoolean('disable');
        $this->code = $this->parseValue('code');
        $this->shortName = $this->parseValue('shortName');
        $this->fullName = $this->parseValue('fullName');
        // $this->legalForm
        $this->registrationId = $this->parseValue('registrationId');
        $this->kpp = $this->parseValue('kpp');
        $this->okpoCode = $this->parseValue('okpoCode');
        $this->foreign = $this->parseBoolean('foreign');
        $this->simpleTaxed = $this->parseBoolean('simpleTaxed');
        $this->financeDocumentPropertiesReference = $this->parseReference('financeDocumentProperties');
        $this->financeRestrictionsReference = $this->parseReference('financeRestrictions');
        $this->notes = $this->parseValue('notes');
        $this->types = $this->parseArray('types');
    }

    public function isActive()
    {
        return $this->active;
    }

    public function isDisable()
    {
        return $this->disable;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getShortName()
    {
        return $this->shortName;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function getRegistrationId()
    {
        return $this->registrationId;
    }

    public function getKpp()
    {
        return $this->kpp;
    }

    public function getOkpoCode()
    {
        return $this->okpoCode;
    }

    public function isForeign()
    {
        return $this->foreign;
    }

    public function isSimpleTaxed()
    {
        return $this->simpleTaxed;
    }

    public function getFinanceDocumentPropertiesReference()
    {
        return $this->financeDocumentPropertiesReference;
    }

    public function getFinanceRestrictionsReference()
    {
        return $this->financeRestrictionsReference;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function getTypes()
    {
        return $this->types;
    }
}
