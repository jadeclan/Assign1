<?php

namespace Application;

use Framework\Model;
class ContinentsModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT ContinentCode, ContinentName FROM continents ORDER BY ContinentName";

        return $this->db->query($sql)->fetchAll();
    }

    public function getByContinentCode($continentCode)
    {
        $sql = "SELECT * FROM continents WHERE ContinentCode = " . $this->db->quote(strtoupper($continentCode));

        return $this->db->query($sql)->fetchAll();
    }
}