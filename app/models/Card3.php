<?php

namespace Application;

use Framework\Model;
use Framework\View;
use Framework\Controller;
/**
 * The Card3Model class. Extends the model class (Database Access)
 * Provides the functionality to query the database
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
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