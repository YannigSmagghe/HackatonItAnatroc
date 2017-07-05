<?php

namespace AppBundle\Model\velov;

/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 05/07/17
 * Time: 14:14
 */
class VelovArret
{

    private $name;
    private $address;
    private $commune;
    private $latitude;
    private $longitude;
    private $bike_stands;
    private $status;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * @param mixed $commune
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getBikeStands()
    {
        return $this->bike_stands;
    }

    /**
     * @param mixed $bike_stands
     */
    public function setBikeStands($bike_stands)
    {
        $this->bike_stands = $bike_stands;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    public function returnJson(&$data)
    {
        foreach ($this as $key => $value)
        {
            $data[$key] = $value;
        }
    }

}