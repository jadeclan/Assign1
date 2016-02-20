<?php

namespace Application;

use Framework\Model;
class DeviceBrandModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM device_brands ORDER BY name";

        return $this->db->query($sql)->fetchAll();
    }

    public function getByID($brandID)
    {
        if (empty($brandId) || !is_numeric($brandID))
            return [];

        $sql = "SELECT * FROM device_brands WHERE ID = $brandID";

        return $this->db->query($sql)->fetchAll();
    }
}