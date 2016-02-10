<?php

namespace Application;

use Framework\Model;

class DeviceTypeModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM device_types ORDER BY name";

        return $this->db->query($sql)->fetchAll();
    }

    public function getByID($typeID)
    {
        if (empty($brandId) || !is_numeric($typeID))
            return [];

        $sql = "SELECT * FROM device_types WHERE ID = $typeID";

        return $this->db->query($sql)->fetchAll();
    }
}