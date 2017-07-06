<?php

namespace AppBundle\Controller;

use AppBundle\Model\velov\VelovParc;
use AppBundle\Service\Velov\Velov;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Api\Subway\SubwayTCL;
use AppBundle\Model\ApiData;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    const API_DATA_TYPE = 'main';

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $apiData = new ApiData();
        $apiData->setType(self::API_DATA_TYPE);
        $data = $this->get(SubwayTCL::class)->getStations();


        $this->get(Velov::class)->getMainJson();


        $apiData->setData(array_merge($data, VelovParc::returnFirstsInArray(15)));
        //$apiData->setData(VelovParc::returnFirstsInArray(15));


        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($apiData->getData(), 'json');


        return new JsonResponse($jsonContent, 200, [], true);
    }
}
