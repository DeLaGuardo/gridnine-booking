<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DateTime;

class Product extends Entity
{
    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $reservationReference;

    /**
     * @var boolean
     */
    private $contractRulesApplied;

    /**
     * @var string
     */
    private $ticketType;

    /**
     * @var string
     */
    private $passengerType;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $blankOwnerRefReference;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $blankTypeReference;

    /**
     * @var boolean
     */
    private $checked;

    /**
     * @var boolean
     */
    private $eticket;

    /**
     * @var \DateTime
     */
    private $issueDate;

    /**
     * @var string
     */
    private $systemNumber;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $validatorCode;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $cashierReference;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $salesPointReference;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $subagencyReference;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $agencyReference;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $supplierReference;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $validationMessagesReferenceList;

    /**
     * @var string
     */
    private $blankOwnerNumber;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $carrierReference;

    /**
     * @var string
     */
    private $carrierNumber;

    /**
     * @var string
     */
    private $endorsement;

    /**
     * @var string
     */
    private $fareCalculationData;

    /**
     * @var string
     */
    private $conjCoun;

    /**
     * @var string
     */
    private $pcc;

    /**
     * @var string
     */
    private $productCategory;

    /**
     * @var string
     */
    private $tariffType;

    /**
     * @var string
     */
    private $telexNumber;

    /**
     * @var string
     */
    private $tourCode;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $travellerReference;

    /**
     * @var string
     */
    private $cashierCode;

    /**
     * @var string
     */
    private $luggageWeight;

    /**
     * @var boolean
     */
    private $forcedRefund;

    /**
     * @var boolean
     */
    private $duplicate;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $bspCommissionValueReference;

    /**
     * @var string
     */
    private $mainProductNumber;

    /**
     * @var boolean
     */
    private $subsidizedTariff;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $tripartiteContractDetailsReference;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $faresReferenceList;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $commissionsReferenceList;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $vendorFopsReferenceList;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $clientFopsReferenceList;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $segmentTariffsReferenceList;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\EntityList
     */
    private $taxesReferenceList;

    /**
     * @var string
     */
    private $totalEquivalentFare;

    protected function parse()
    {
        // Basic
        $this->contractRulesApplied = $this->parseBoolean('contractRulesApplied');
        $this->ticketType = $this->parseValue('ticketType');
        $this->passengerType = $this->parseValue('passengerType');
        $this->checked = $this->parseBoolean('checked');
        $this->eticket = $this->parseBoolean('eticket');
        $this->issueDate = new DateTime($this->parseValue('issueDate'));
        $this->systemNumber = $this->parseValue('systemNumber');
        $this->status = $this->parseValue('status');
        $this->validatorCode = $this->parseValue('validatorCode');
        $this->blankOwnerNumber = $this->parseValue('blankOwnerNumber');
        $this->carrierNumber = $this->parseValue('carrierNumber');
        $this->endorsement = $this->parseValue('endorsement');
        $this->fareCalculationData = $this->parseValue('fareCalculationData');
        $this->conjCoun = $this->parseValue('conjCoun');
        $this->pcc = $this->parseValue('pcc');
        $this->productCategory = $this->parseValue('productCategory');
        $this->tariffType = $this->parseValue('tariffType');
        $this->telexNumber = $this->parseValue('telexNumber');
        $this->tourCode = $this->parseValue('tourCode');
        $this->cashierCode = $this->parseValue('cashierCode');
        $this->luggageWeight = $this->parseValue('luggageWeight');
        $this->forcedRefund = $this->parseBoolean('forcedRefund');
        $this->duplicate = $this->parseBoolean('duplicate');
        $this->mainProductNumber = $this->parseValue('mainProductNumber');
        $this->subsidizedTariff = $this->parseBoolean('subsidizedTariff');
        $this->totalEquivalentFare = $this->parseValue('totalEquivalentFare');

        // References
        $this->reservationReference = $this->parseReference('reservation');
        $this->blankOwnerRefReference = $this->parseReference('blankOwnerRef');
        $this->blankTypeReference = $this->parseReference('blankType');
        $this->cashierReference = $this->parseReference('cashier');
        $this->salesPointReference = $this->parseReference('salesPoint');
        $this->subagencyReference = $this->parseReference('subagency');
        $this->agencyReference = $this->parseReference('agency');
        $this->supplierReference = $this->parseReference('supplier');
        $this->carrierReference = $this->parseReference('carrier');
        $this->travellerReference = $this->parseReference('traveller');
        $this->bspCommissionValueReference = $this->parseReference('bspCommissionValue');
        $this->tripartiteContractDetailsReference = $this->parseReference('tripartiteContractDetails');

        // Arrays of references
        $this->productsReferenceList = $this->parseReferenceList('products');
        $this->validationMessagesReferenceList = $this->parseReferenceList('validationMessages');
        $this->faresReferenceList = $this->parseReferenceList('fares');
        $this->commissionsReferenceList = $this->parseReferenceList('commissions');
        $this->vendorFopsReferenceList = $this->parseReferenceList('vendorFops');
        $this->clientFopsReferenceList = $this->parseReferenceList('clientFops');
        $this->segmentTariffsReferenceList = $this->parseReferenceList('segmentTariffs');
        $this->taxesReferenceList = $this->parseReferenceList('taxes');
    }

    public function isContractRulesApplied()
    {
        return $this->contractRulesApplied;
    }

    public function isChecked()
    {
        return $this->checked;
    }

    public function isEticket()
    {
        return $this->eticket;
    }

    public function isForcedRefund()
    {
        return $this->forcedRefund;
    }

    public function isDuplicate()
    {
        return $this->duplicate;
    }

    public function isSubsidizedTariff()
    {
        return $this->subsidizedTariff;
    }

    public function getIssueDate()
    {
        return $this->issueDate;
    }

    public function getTicketType()
    {
        return $this->ticketType;
    }

    public function getPassengerType()
    {
        return $this->passengerType;
    }

    public function getSystemNumber()
    {
        return $this->systemNumber;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getValidatorCode()
    {
        return $this->validatorCode;
    }

    public function getBlankOwnerNumber()
    {
        return $this->blankOwnerNumber;
    }

    public function getCarrierNumber()
    {
        return $this->carrierNumber;
    }

    public function getEndorsement()
    {
        return $this->endorsement;
    }

    public function getFareCalculationData()
    {
        return $this->fareCalculationData;
    }

    public function getConjCoun()
    {
        return $this->conjCoun;
    }

    public function getPcc()
    {
        return $this->pcc;
    }

    public function getProductCategory()
    {
        return $this->productCategory;
    }

    public function getTariffType()
    {
        return $this->tariffType;
    }

    public function getTelexNumber()
    {
        return $this->telexNumber;
    }

    public function gettTourCode()
    {
        return $this->tourCode;
    }

    public function getCashierCode()
    {
        return $this->cashierCode;
    }

    public function getLuggageWeight()
    {
        return $this->luggageWeight;
    }

    public function getTotalEquivalentFare()
    {
        return $this->totalEquivalentFare;
    }

    public function getReservationReference()
    {
        return $this->reservationReference;
    }

    public function getBlankOwnerRefReference()
    {
        return $this->blankOwnerRefReference;
    }

    public function getBlankTypeReference()
    {
        return $this->blankTypeReference;
    }

    public function getCashierReference()
    {
        return $this->cashierReference;
    }

    public function getSalesPointReference()
    {
        return $this->salesPointReference;
    }

    public function getSubagencyReference()
    {
        return $this->subagencyReference;
    }

    public function getAgencyReference()
    {
        return $this->agencyReference;
    }

    public function getSupplierReference()
    {
        return $this->supplierReference;
    }

    public function getCarrierReference()
    {
        return $this->carrierReference;
    }

    public function getTravellerReference()
    {
        return $this->travellerReference;
    }

    public function getBspCommissionValueReference()
    {
        return $this->bspCommissionValueReference;
    }

    public function getTripartiteContractDetailsReference()
    {
        return $this->tripartiteContractDetailsReference;
    }

    public function getProductsReferenceList()
    {
        return $this->productsReferenceList;
    }

    public function getValidationMessagesReferenceList()
    {
        return $this->validationMessagesReferenceList;
    }

    public function getFaresReferenceList()
    {
        return $this->faresReferenceList;
    }

    public function getCommissionsReferenceList()
    {
        return $this->commissionsReferenceList;
    }

    public function getVendorFopsReferenceList()
    {
        return $this->vendorFopsReferenceList;
    }

    public function getClientFopsReferenceList()
    {
        return $this->clientFopsReferenceList;
    }

    public function getSegmentTariffsReferenceList()
    {
        return $this->segmentTariffsReferenceList;
    }

    public function getTaxesReferenceList()
    {
        return $this->taxesReferenceList;
    }
}
