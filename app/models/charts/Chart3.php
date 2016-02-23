<?php

namespace Application\API\Model;

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

        $sql = "SELECT countryName,
                       count(*) AS visits,
                       EXTRACT(MONTH FROM visits.visit_date) AS theMonth
                FROM visits
                  JOIN countries ON visits.country_code = countries.ISO
                WHERE (EXTRACT(year from visits.visit_date) = 2016)
                  AND (EXTRACT(month from visits.visit_date) IN (1,5,9))
                  AND (countries.ISO = $country1 OR countries.ISO = $country2 OR countries.ISO = $country3 )
                GROUP BY countryName, theMonth
                ORDER BY visits DESC
                ";

        // pivot! easier to push into the google chart array in this format...
        $sql = "SELECT countryName,
                       MAX(IF(theMonth = 1, visits, NULL)) as Jan,
                       MAX(IF(theMonth = 5, visits, NULL)) as May,
                       MAX(IF(theMonth = 8, visits, NULL)) as Sept
                FROM ($sql) visits
                GROUP BY countryName";


        return $this->db->query($sql)->fetchAll();
    }
}
