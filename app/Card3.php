<?php

namespace Application;

use Framework\Model;
use Framework\View;
use Framework\Controller;

class Card3 extends Controller
{
    public function __construct()
    {
        parent::__construct('Card3');
    }

    public function Content()
    {
        return new View('Card3.tpl');
    }
}
/*
 *     // implement any setters that need input checking/validation
    public function jsonSerialize () {
        return array(
            'continentName'=>$this->continentName,
            'countryName'=>$this->countryName,
            'hits'=>$this->hits,
        );
    }
    protected function getSelectStatement(){
        return $this->getSQLwithJoins();
    }

    private function getSQLwithJoins(){
        $sql = "select continentName, countryName, count(*) as hits ";
        $sql .= "from ((continents inner join countries on continents.ContinentCode=countries.Continent) ";
        $sql .= "inner join visits on countries.ISO=visits.country_code) ";
        $sql .= "group by countryName order by ContinentName, CountryName";
        return $sql;
    }
 function to display a list of options
 *
 * $inArray an array containing continent names


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