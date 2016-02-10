<?php

namespace Application;

use Framework\Model;

class OperatingSystemModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM operating_systems ORDER BY name";

        return $this->db->query($sql)->fetchAll();
    }

    public function getByCountryCode($osID)
    {
        $sql = "SELECT * FROM operating_systems WHERE ID = $osID";

        return $this->db->query($sql)->fetchAll();
    }
}