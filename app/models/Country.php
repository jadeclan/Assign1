<?php

namespace Application;

use Framework\Model;

class CountryModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM countries ORDER BY CountryName";

        return $this->db->query($sql)->fetchAll();
    }

    public function getByCountryCode($countryCode)
    {
        $sql = "SELECT * FROM countries WHERE ISO = " . $this->db->quote(strtoupper($countryCode));

        return $this->db->query($sql)->fetchAll();
    }
}