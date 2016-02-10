<?php

namespace Application;

use Framework\Model;

class BrowserModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM browsers ORDER BY name";

        return $this->db->query($sql)->fetchAll();
    }

    public function getByID($brandID)
    {
        if (empty($brandId) || !is_numeric($brandID))
            return [];

        $sql = "SELECT * FROM browsers WHERE ID = $brandID";

        return $this->db->query($sql)->fetchAll();
    }
}