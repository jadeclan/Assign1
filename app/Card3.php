<?php

namespace Application;

use Framework\Model;
use Framework\View;
use Framework\Controller;

class Card3Model extends Model implements \jsonSerializable
{

    public function getContinents()
    {
        $result = self::$db->query("SELECT continentName
                                    FROM continents
                                    ORDER BY continentName;");

        return $result->fetchAll();
    }

    public function getContinentList()
    {
        $result = self::$db->query("select continentName, countryName, count(*) as hits
         from ((continents inner join countries on continents.ContinentCode=countries.Continent)
         inner join visits on countries.ISO=visits.country_code)
         group by countryName order by ContinentName, CountryName");

        return $result->fetchAll();
    }

    public function jsonSerialize()
    {
        return array(
            'continentName' => $this->continentName,
            'countryName' => $this->countryName,
            'hits' => $this->hits,
        );
    }
}

class Card3 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card3');

        $this->model = new Card3Model();
    }

    public function Content()
    {
        return new View('Card3.tpl', [
            'continents' => $this->model->getContinents(),
            'continentData' => $this->model->getContinentList()
        ]);
    }
}

/*
function createContinentOptionList($inArray){
    $continentList = Array();
    echo '<option disabled selected>Select a Continent</option>' . PHP_EOL;
    foreach($inArray as $row){
        if(!in_array($row->continentName, $continentList)){
            $continentList[] = $row->continentName;
            echo '<option value="' . $row->continentName. '">' . $row->continentName . '</option>' . PHP_EOL;
        }
    }
*/