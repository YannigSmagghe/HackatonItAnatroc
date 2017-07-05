<?php

namespace AppBundle\Service\Velov;


use \Symfony\Component\Config\Definition\Exception\Exception;
use AppBundle\Model\VelovArret;

class Velov
{
    /**
     *
     *
     */
    public function getMainJson()
    {
        $apiNum = 2;


        if($apiNum == 1) {
            $client = new \GuzzleHttp\Client();
            $response = $client->request("GET","https://inspire.data.gouv.fr/api/geogw/services/556c63df330f1fcd48345220/feature-types/ms:jcd_jcdecaux.jcdvelov/download?format=GeoJSON&projection=WGS84");
        }
        else if ($apiNum == 2)
        {
            $client = new \GuzzleHttp\Client();
            $response = $client->request("GET","https://public.opendatasoft.com/api/records/1.0/search/?dataset=station-velov-grand-lyon&lang=fr&rows=10&geofilter.distance=45.8520930694%2C4.34738897685%2C1000000000");
        }

        if(isset($response))
        {
            $body = $response->getBody();
            $JSONresult = $body->getContents();


            $resultsData = json_decode($JSONresult);


            foreach ($resultsData as $resultData)
            {
                dump($resultData);
            }



            return($resultsData);
        }

        throw new Exception("Aucune api selectionnée");
    }
}