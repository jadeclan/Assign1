<?php

namespace Application;

use Framework\Model;
/**
 * The Card3Model class. Extends the model class (Database Access)
 * Provides the functionality to query the database
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
class Card3Model extends Model
{

    public function getContinents()
    {
        $result = $this->db->query("SELECT continentName
                                    FROM continents
                                    ORDER BY continentName;");

        return $result->fetchAll();
    }

    public function getContinentList()
    {
        $result = $this->db->query("select continentName, countryName, count(*) as hits
         from ((continents inner join countries on continents.ContinentCode=countries.Continent)
         inner join visits on countries.ISO=visits.country_code)
         group by countryName order by ContinentName, CountryName");

        return $result->fetchAll();
    }
}