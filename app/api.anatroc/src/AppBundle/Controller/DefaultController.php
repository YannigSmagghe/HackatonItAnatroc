<?php

namespace AppBundle\Controller;

use AppBundle\Model\velov\VelovParc;
use AppBundle\Service\Velov\Velov;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Api\Subway\SubwayTCL;
use AppBundle\Model\ApiData;
use AppBundle\Resolver\ApiServiceResolver;
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
        // Simulation of user input to retrieve related services from his keywords
        $services = $this->get(ApiServiceResolver::class)->resolveByApiKeyWords(['metro', 'meteo', 'slip', 'bike']);

        $apiData = new ApiData();
        $apiData->setType(self::API_DATA_TYPE);
        foreach ($services as $service) {
            if ($service instanceof SubwayTCL) {
                $data = $this->get(SubwayTCL::class)->getStations();
                $apiData->addData(array_slice($data, 0, 15));
            }
            if($service instanceof Velov)
            {
                //Define an array of VelovArret object
                $data = $this->get(Velov::class)->setVelovParc();
                $nbVeloToSee = 15;
                //Return the formated data array
                $apiData->addData(array_slice($data, 0, $nbVeloToSee));
            }
        }


        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($apiData, 'json');

        return new JsonResponse($jsonContent, 200, [], true);
    }
}
