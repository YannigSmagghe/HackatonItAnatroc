<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 04/07/17
 * Time: 14:27
 */

namespace AppBundle\Api\Weather;

use AppBundle\Model\Weather\WeatherData;

class WeatherInfoClimat extends AbstractWeather
{
    /**
     * @return WeatherData
     * Requête et retourne les infos météo
     */
    public function getWeather()
    {
        $response = $this->getGuzzle()->get('http://www.infoclimat.fr/public-api/gfs/json?_ll=45.77987,4.88471&_auth=UUsCFQ5wV3VVeFdgBnBWf1U9ADULfQIlBnoFZgtuAH1UP1AxUjIHYVM9WyYDLAUzBShXNAA7CTkFbgV9Xy1UNVE7Am4OZVcwVTpXMgYpVn1VewBhCysCJQZmBWULeABiVDFQPVIvB2RTOVs%2BAy0FMwU0VzIAIAkuBWcFZl87VD5RMgJuDmpXPVU5VzEGKVZ9VWMAaQsxAmsGYQVhCzIAMlQ%2FUGJSMgc0U21bMAMtBTMFMlczADsJNwVjBWJfO1QoUS0CHw4eVyhVeld3BmNWJFV7ADULagJu&_c=027a5f6d83c9c484d1f0ba18810b275f');
        $json = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $weather = $this->getWeatherByDate($json);

        return $this->transformToWeatherData($weather);
    }

    /**
     * @param $json
     * @return WeatherData
     * Récupère les données du json pour les mettre dans un objet qui sera ajouté au json global retourné
     */

    private function transformToWeatherData($json)
    {
        $weather = new WeatherData();

        $weather->setType($this->getType());

        $weather->setTemperature($json->temperature->sol - self::KELVIN_TO_CELSIUS);

        $weather->setWindForce($json->vent_moyen->{'10m'});

        //$weather->setWindDirection($json->vent_direction->{'10m'});

        $weather->setWeather($this->getWeatherByParams($json->risque_neige,$json->pluie,$json->pluie_convective,$json->nebulosite->totale,$json->vent_moyen));

        return $weather;
    }

    /**
     * @return array
     * Obtient la bonne date à requêter
     */
    public function getDate($result)
    {
        $test = true;
        $date = date('Y-m-d H:m:i'); //date actuelle

        foreach ($result as $key => $value) {
            if (strtotime($date) > strtotime($key)){
                $dateavant = $key;
            } else {
                if ($test == true) {
                    $dateapres = $key;
                    $test = false;
                }
            }
        }

        $datetrue = $this->getBetterDate($dateavant,$dateapres,$date);

        return $datetrue;
    }

    /**
     * @return array
     * Obtient la météo actuelle suivant la date actuelle
     */
    public function getWeatherByDate($data)
    {
        $datetrue = $this->getDate($data);

        return $data->$datetrue;
    }

    /**
     * @return \DateTime|null
     * Retourne la date la plus proche par rapport à la date actuelle
     */
    public function getBetterDate($dateavant, $dateapres, $date)
    {
        $valeur1 = strtotime($date) - strtotime($dateavant);
        $valeur2 = strtotime($dateapres) - strtotime($date);

        if ($valeur1 < $valeur2) {
            $datetrue = $dateavant;
        } elseif ($valeur1 > $valeur2) {
            $datetrue = $dateapres;
        }

        return $datetrue;
    }

    /**
     * @return integer
     * Détermine la météo suivant les paramètres récupérés dans le json
     * neige = boolean indiquant le risque de neige
     * pluie = la pluie prévue en millimètres
     * pluie_convective = la pluie convective en millimètres
     * nebulosite = pourcentage de nuage recouvrant le ciel
     * vent_moyen = vitesse en km/h du vent
     */
    public function getWeatherByParams($neige, $pluie, $pluie_convective, $nebulosite, $vent_moyen)
    {
        $weather = self::TYPE_SUN;
        if ($neige == 'oui') {
            $weather = self::TYPE_SNOW;
        } elseif ($pluie_convective > 0 && $vent_moyen > 25) {
            $weather = self::TYPE_STORM;
        } elseif ($pluie > 0) {
            $weather = self::TYPE_RAIN;
        } elseif ($nebulosite > 50) {
            $weather = self::TYPE_CLOUD;
        }

        return $weather;
    }
}