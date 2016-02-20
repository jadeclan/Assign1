<?php

namespace Application;

use Framework\Model;

class CountryModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT ISO, CountryName FROM countries ORDER BY CountryName";

        return $this->db->query($sql)->fetchAll();
    }

    public function getByCountryCode($countryCode)
    {
        $sql = "SELECT * FROM countries WHERE ISO = " . $this->db->quote(strtoupper($countryCode));

        return $this->db->query($sql)->fetchAll();
    }

    public function getTopTen()
    {
        $sql = "SELECT ISO, CountryName, count(*) as visits
                FROM countries
                    JOIN visits ON countries.ISO = visits.country_code
                GROUP BY countries.ISO
                ORDER BY visits DESC
                LIMIT 10";

        $sql = "SELECT * FROM ($sql) topten ORDER BY topten.CountryName";


        return $this->db->query($sql)->fetchAll();
    }
}