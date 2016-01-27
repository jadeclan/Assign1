<?php
/*
  Table Data Gateway for the continent-visits table.
 *
 * User: james
 * Date: 26/01/16
 * Time: 8:02 PM
 */
class ContinentVisitsTableGateway extends TableDataGateway
{
    public function __construct($dbAdapter)
    {
        parent::__construct($dbAdapter);
    }

    protected function getDomainObjectClassName()
    {
        return "ContinentVisits";
    }
    protected function getTableName()
    {
        return "continents";
    }
    protected function getOrderFields()
    {
        return 'continentname';
    }

    protected function getPrimaryKeyName() {
        return "continentcode";
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

}

?>