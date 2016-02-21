<?php

namespace Application;

use Framework\Model;
/**
 * The Card2Dash2Model class. Extends the model class (Database Access)
 * Provides the functionality to query the database
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
class Card2Dash2Model extends Model
{
    public function search($brand = null)
    {
        $sql = $this->buildSearch($brand);

        // Execute
        $result = $this->db->query($sql);

        // Return results

        return $result->fetchAll();
    }

    private function buildSearch($brand = null)
    {

        $sql = "SELECT device_brands.name as deviceBrand, count(*) as hits
                FROM visits
                JOIN device_brands on device_brands.ID=visits.device_brand_id";

        if($brand != null) {
            // Build filter
            $sql .= " WHERE brand_device.name = " . $brand;
            }

        $sql .= " GROUP BY device_brands.name";

        return $sql;
    }
}