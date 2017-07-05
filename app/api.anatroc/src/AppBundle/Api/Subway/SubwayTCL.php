<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 04/07/17
 * Time: 14:27
 */

namespace AppBundle\Api\Subway;


use AppBundle\Api\AbstractApi;
use AppBundle\Model\Subway\SubwayData;
use GuzzleHttp\Client;

class SubwayTCL extends AbstractApi
{
    /**
     * @var string
     */
    const API_DATA_TYPE = 'transport.metro.tcl';

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


    public function getStations()
    {
        $response = $this->getGuzzle()->get('https://download.data.grandlyon.com/ws/rdata/tcl_sytral.tclarret/all.json');
        $json = \GuzzleHttp\json_decode($response->getBody()->getContents());

        return $this->transformToSubways($json);
    }

    private function transformToSubways($json)
    {
        $subways = [];
        $subway = new SubwayData();
        $subway->setType($this->getType());
        foreach ($json->values as $record) {
            $sub = clone $subway;
            $sub->setStationName($record->nom);
            $sub->setArrivalTime($record->last_update_fme);
            $sub->setDepartureTime($record->last_update_fme);
            $subways[] = $sub;
        }

        return $subways;
    }
}

