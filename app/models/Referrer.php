<?php

namespace Application;

use Framework\Model;
class ReferrerModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM referrers ORDER BY name";

        return $this->db->query($sql)->fetchAll();
    }

    public function getByID($brandID)
    {
        if (empty($brandId) || !is_numeric($brandID))
            return [];

        $sql = "SELECT * FROM referrers WHERE ID = $brandID";

        return $this->db->query($sql)->fetchAll();
    }
}