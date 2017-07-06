<?php

namespace AppBundle\Service\Velov;


use AppBundle\Model\velov\VelovData;
use AppBundle\Model\velov\VelovParc;
use \Symfony\Component\Config\Definition\Exception\Exception;
use AppBundle\Model\velov\VelovArret;

class Velov
{
    /**
     *  Execution code :
     *      1 : everything is ok
     *
     *
     */
    public function getMainJson()
    {
        $apiNum = 1;


        if($apiNum == 1) {
            $client = new \GuzzleHttp\Client();
            //$response = $client->request("GET","https://inspire.data.gouv.fr/api/geogw/services/556c63df330f1fcd48345220/feature-types/ms:jcd_jcdecaux.jcdvelov/download?format=GeoJSON&projection=WGS84");
            $response = $client->request("GET","https://inspire.data.gouv.fr/api/geogw/services/556c63df330f1fcd48345220/feature-types/ms:jcd_jcdecaux.jcdvelov/download?format=GeoJSON&projection=WGS84");


            $body = $response->getBody();
            $JSONresult = $body->getContents();


            $resultsData = json_decode($JSONresult);


            //$arrets = [];
            //$arret = new VelovData();
            //$arret->setType('transport.velov');

            VelovParc::$park = array();
            foreach ($resultsData->features as $recordData)
            {
                //$temp = clone $arret;



                //dump($recordData);
                //$temp->setAddress($recordData->properties->address);
                //$temp->setBikeStands($recordData->properties->available_bike_stands + $recordData->properties->available_bikes);

                $arret = new VelovArret();

                $arret->setAddress($recordData->properties->address);
                $arret->setBikeStands($recordData->properties->bike_stands);
                $arret->setLatitude($recordData->properties->lat);
                $arret->setLongitude($recordData->properties->lng);
                $arret->setAddress($recordData->properties->address);
                $arret->setCommune($recordData->properties->commune);
                $arret->setStatus($recordData->properties->status);
                $arret->setName($recordData->properties->name);
                $arret->setAvailableStand($recordData->properties->available_bike_stands);
                //$arrets[] = $temp;
                //dump($arret);
                VelovParc::$park[] = $arret;
            }

            return 1;

        }
        else if ($apiNum == 2)
        {
            $client = new \GuzzleHttp\Client();
            $response = $client->request("GET","https://public.opendatasoft.com/api/records/1.0/search/?dataset=station-velov-grand-lyon&lang=fr&rows=10&geofilter.distance=45.8520930694%2C4.34738897685%2C1000000000");


            $body = $response->getBody();
            $JSONresult = $body->getContents();


            $resultsData = json_decode($JSONresult);

            //dump($resultsData);
            VelovParc::$park = array();
            foreach ($resultsData->records as $recordData)
            {
                $arret = new VelovArret();
                //dump($recordData);
                $arret->setAddress($recordData->fields->address);
                $arret->setBikeStands($recordData->fields->bike_stand);
                $arret->setLatitude($recordData->fields->lat);
                $arret->setLongitude($recordData->fields->lng);
                $arret->setAddress($recordData->fields->address);
                $arret->setCommune($recordData->fields->commune);
                $arret->setStatus($recordData->fields->status);
                $arret->setName($recordData->fields->name);

                VelovParc::$park[] = $arret;

            }

            return 1;
        }


        throw new Exception("Aucune api selectionnée");
    }
}