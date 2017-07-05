<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 05/07/17
 * Time: 15:55
 */

namespace AppBundle\Model\velov;


class VelovParc
{
    static public $park = array();

    static public function returnFirstsInArray($number_record)
    {
        $result = array();
        for ($i = 0; $i < $number_record; $i++) {
            $data = array();
            $data['type'] = "transport.velov";
            $data['errors'] = array();
            VelovParc::$park[$i]->returnJson($data['data']);

            $result[] = $data;

        }

        return $result;
    }
}