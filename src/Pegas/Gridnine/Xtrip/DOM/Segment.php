<?php

namespace Pegas\Gridnine\Xtrip\DOM;

use DateTime;

class Segment extends Entity
{
    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $airlineReference;

    /**
     * @var string
     */
    private $arriveCityCode;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $arriveLocationReference;

    /**
     * @var string
     */
    private $arriveTerminal;

    /**
     * @var string
     */
    private $departCityCode;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $departureLocationReference;

    /**
     * @var string
     */
    private $departTerminal;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var string
     */
    private $flightDuration;

    /**
     * @var string
     */
    private $flightNo;

    /**
     * @var string
     */
    private $recordNumber;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var string
     */
    private $noOfStops;

    /**
     * @var boolean
     */
    private $starting;

    /**
     * @var \DateTime
     */
    private $notValidBefore;

    /**
     * @var \DateTime
     */
    private $notValidAfter;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $baggageWeightLimit;

    /**
     * @var string
     */
    private $classOfService;

    /**
     * @var string
     */
    private $classOfSvcCode;

    /**
     * @var string
     */
    private $fareBasis;

    /**
     * @var string
     */
    private $airlineLocator;

    /**
     * @todo
     * @var \Pegas\Gridnine\Xtrip\Reference\Entity
     */
    private $segPrefConfirmsReference;

    protected function parse()
    {
        // boolean
        $this->starting = $this->parseBoolean('starting');

        //strings
        $this->arriveCityCode = $this->parseValue('arriveCityCode');
        $this->arriveTerminal = $this->parseValue('arriveTerminal');
        $this->departCityCode = $this->parseValue('departCityCode');
        $this->departTerminal = $this->parseValue('departTerminal');
        $this->flightDuration = $this->parseValue('flightDuration');
        $this->flightNo = $this->parseValue('flightNo');
        $this->recordNumber = $this->parseValue('recordNumber');
        $this->noOfStops = $this->parseValue('noOfStops');
        $this->status = $this->parseValue('status');
        $this->baggageWeightLimit = $this->parseValue('baggageWeightLimit');
        $this->classOfService = $this->parseValue('classOfService');
        $this->classOfSvcCode = $this->parseValue('classOfSvcCode');
        $this->fareBasis = $this->parseValue('fareBasis');
        $this->airlineLocator = $this->parseValue('airlineLocator');

        //Date
        $this->endDate = new DateTime($this->parseValue('endDate'));
        $this->startDate = new DateTime($this->parseValue('startDate'));
        $this->notValidBefore = new DateTime($this->parseValue('notValidBefore'));
        $this->notValidAfter = new DateTime($this->parseValue('notValidAfter'));

        // References
        $this->airlineReference = $this->parseReference('airline');
        $this->arriveLocationReference = $this->parseReference('arrive');
        $this->departureLocationReference = $this->parseReference('departureLocation');
        $this->segPrefConfirmsReference = $this->parseReference('segPrefConfirms');
    }

    public function isStarting()
    {
        return $this->starting;
    }

    public function getArriveCityCode()
    {
        return $this->arriveCityCode;
    }

    public function getArriveTerminal()
    {
        return $this->arriveTerminal;
    }

    public function getDepartCityCode()
    {
        return $this->departCityCode;
    }

    public function getDepartTerminal()
    {
        return $this->departTerminal;
    }

    public function getFlightDuration()
    {
        return $this->flightDuration;
    }

    public function getFlightNo()
    {
        return $this->flightNo;
    }

    public function getRecordNumber()
    {
        return $this->recordNumber;
    }

    public function getNoOfStops()
    {
        return $this->noOfStops;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getBaggageWeightLimit()
    {
        return $this->baggageWeightLimit;
    }

    public function getClassOfService()
    {
        return $this->classOfService;
    }

    public function getClassOfSvcCode()
    {
        return $this->classOfSvcCode;
    }

    public function getFareBasis()
    {
        return $this->fareBasis;
    }

    public function getAirlineLocator()
    {
        return $this->airlineLocator;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getNotValidBefore()
    {
        return $this->notValidBefore;
    }

    public function getNotValidAfter()
    {
        return $this->notValidAfter;
    }

    public function getAirlineReference()
    {
        return $this->airlineReference;
    }

    public function getArriveLocationReference()
    {
        return $this->arriveLocationReference;
    }

    public function getDepartureLocationReference()
    {
        return $this->departureLocationReference;
    }

    public function getSegPrefConfirmsReference()
    {
        return $this->segPrefConfirmsReference;
    }
}
