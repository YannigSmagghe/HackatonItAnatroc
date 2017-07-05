<?php

namespace AppBundle\Model\Subway;

use AppBundle\Model\ApiData;

class SubwayData extends ApiData
{
    /**
     * @return string
     */
    public function getStationName(): string
    {
        return $this->data['station_name'];
    }

    /**
     * @return \DateTime|null
     */
    public function getArrivalTime(): ?\DateTime
    {
        return $this->data['arrival_time'];
    }

    /**
     * @return \DateTime|null
     */
    public function getDepartureTime(): ?\DateTime
    {
        return $this->data['departure_time'];
    }

    /**
     * @param string $stationName
     * @return SubwayData
     */
    public function setStationName(string $stationName): SubwayData
    {
        $this->data['station_name'] = $stationName;

        return $this;
    }

    /**
     * @param \DateTime|null $arrivalTime
     * @return SubwayData
     */
    public function setArrivalTime($arrivalTime)
    {
        $this->data['arrival_time'] = $arrivalTime;
        return $this;
    }

    /**
     * @param \DateTime|null $departureTime
     * @return SubwayData
     */
    public function setDepartureTime($departureTime)
    {
        $this->data['departure_time'] = $departureTime;
        return $this;
    }
}