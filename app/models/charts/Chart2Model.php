<?php

namespace Application;

use Framework\Model;
/**
 * The Chart2Model class. Extends the model class (Database Access)
 * Provides the functionality to query the database
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
class Chart2Model extends Model
{
    public function search($year, $month){
        $sql = $this->buildSearch($year, $month);
        $result = $this->db->query($sql);
        return $result->fetchAll();
    }
    public function buildSearch($year, $month) {
        $sql = "SELECT visits.visit_date, countryName, count(*) as visitsCount FROM continents, countries, visits WHERE (continents.ContinentCode = countries.Continent) AND (countries.ISO = visits.country_code) AND (EXTRACT(year from visits.visit_date) = $year) AND (EXTRACT( month from visits.visit_date) = $month) GROUP BY countryName HAVING visitsCount >= 10";
        return $sql;
    }
}