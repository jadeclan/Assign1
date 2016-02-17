<?php

namespace Application;

use Framework\Model;


/**
 * The Card3Dash2Model class. Extends the model class (Database Access)
 * Provides the functionality to query the database
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
class Card3Dash2Model extends Model
{
    public function search($country = null)
    {
        $sql = $this->buildSearch($country);

        // Execute
        $result = $this->db->query($sql);

        // Return results

        return $result->fetchAll();
    }

    private function buildSearch($country = null)
    {
        $sql = "SELECT continentName, countryName, count(*) as hits
         FROM continents, countries, visits
         WHERE (countries.ISO = visits.country_code)
         AND (continents.ContinentCode = countries.Continent)";

                if($country != null) {
                    // Build filter
                    $sql .= " AND countries.Continent = '" . $country . "'";
                }

        $sql .= " GROUP BY countryName";
        return $sql;

    }
}