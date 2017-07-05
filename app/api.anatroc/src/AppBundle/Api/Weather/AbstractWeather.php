<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 04/07/17
 * Time: 14:27
 */

namespace AppBundle\Api\Weather;


use AppBundle\Api\AbstractApi;
use AppBundle\Model\Subway\SubwayData;
use GuzzleHttp\Client;

abstract class AbstractWeather extends AbstractApi
{
    /**
     * @var string
     */
    const API_DATA_TYPE = 'weather';

    /**
     * @var string
     */
    protected $type = self::API_DATA_TYPE;

    /**
     * @var Client
     */
    private $guzzle;

    /**
     * SubwayTCL constructor.
     */
    public function __construct()
    {
        $this->guzzle = new Client();
    }

    /**
     * @return array
     */
    public static function getApiKeywords(): array
    {
        return [
            'temps',
            'meteo',
            'pluie',
            'soleil',
        ];
    }

    /**
     * @return Client
     */
    public function getGuzzle(): Client
    {
        return $this->guzzle;
    }
}

