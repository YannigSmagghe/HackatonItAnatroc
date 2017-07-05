<?php

namespace AppBundle\Controller;

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


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
        $apiData = new ApiData();
        $apiData->setType(self::API_DATA_TYPE);
        $data = $this->get(SubwayTCL::class)->getStations();
        $apiData->addData($data);

        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($data, 'json');


        return new JsonResponse($jsonContent, 200, [], true);
    }


    /**
     * @Route("/velov", name="velov")
     */
    public function velovAction(Request $request)
    {
        $velov = $this->get(Velov::class);
        $velov->getMainJson();


        die;

    }

}
