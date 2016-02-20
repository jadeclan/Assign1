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
    public function search($year, $month) {
        $result = $this->db->query("SELECT countryName, count(*) AS visitsCount
                                        FROM countries,visits
                                        WHERE countries.ISO = visits.country_code
                                        AND (EXTRACT(year from visits.visit_date) = $year)
                                        AND (EXTRACT( month from visits.visit_date) = $month)
                                        GROUP BY countryName
                                        ORDER BY visitsCount DESC
                                        LIMIT 10");
        return $result->fetchAll();
    }
}
