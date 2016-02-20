<?php

namespace Application;

use Framework\Model;


/**
 * The Chart3Model class. Extends the model class (Database Access)
 * Provides the functionality to query the database
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
class Chart3Model extends Model
{
    public function search($country1, $country2, $country3) {

        $country1 = $this->db->quote($country1);
        $country2 = $this->db->quote($country2);
        $country3 = $this->db->quote($country3);

        $sql = "SELECT countryName, count(*) AS visitsCount, EXTRACT( month from visits.visit_date) AS theMonth
                                        FROM countries,visits
                                        WHERE countries.ISO = visits.country_code
                                        AND (EXTRACT(year from visits.visit_date) = 2016)
                                        AND (EXTRACT( month from visits.visit_date) IN (1,5,8))
                                        AND (countries.ISO = $country1 OR countries.ISO = $country2 OR countries.ISO = $country3 )
                                        GROUP BY countryName, theMonth
                                        ORDER BY visitsCount DESC
                                        ";

        return $this->db->query($sql)->fetchAll();
    }
}
