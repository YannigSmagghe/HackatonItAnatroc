<?php

namespace AppBundle\Model\Weather;

use AppBundle\Model\ApiData;

class WeatherData extends ApiData
{
    /*
     *
     */
    private weatherIndex = ['soleil', 'nuage', 'pluie', 'orage', 'neige'];

    /*
     *
     */
    public function getWeatherIndex(): string
    {
        return $this->weatherIndex;
    }

    /**
     * @return integer
     */
    public function getWeather(): string
    {
        return $this->data['weather'];
    }

    /*
     * @param int $index
     * @return WeatherData
     */
    public function setWeather($index)
    {
        $this->data['weather'] = $this->weatherIndex[$index];
        return $this;
    }

    /**
     * @return string
     */
    public function getTemperature(): string
    {
        return $this->data['temperature'];
    }

    /*
     * @param string $temperature
     * @return WeatherData
     */
    public function setTemperature($temperature)
    {
        $this->data['temperature'] = $temperature;
        return $this;
    }

    /**
     * @return string
     */
    public function getWindForce(): string
    {
        return $this->data['wind_force'];
    }

    /*
     * @param string $windForce
     * @return WeatherData
     */
    public function setWindForce($windForce)
    {
        $this->data['wind_force'] = $windForce;
        return $this;
    }

    /**
     * @return string
     */
    public function getWindDirection(): string
    {
        return $this->data['wind_direction'];
    }

    /*
     * @param string $windDirection
     * @return WeatherData
     */
    public function setWindDirection($windDirection)
    {
        $this->data['wind_direction'] = $windDirection;
        return $this;
    }
}