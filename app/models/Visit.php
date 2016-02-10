<?php

namespace Application;

use Framework\Model;

class VisitModel extends Model
{
    public function search($countryCode = null, $deviceTypeId = null, $deviceBrandId = null, $browserId = null, $referrerId = null, $osId = null, $page = 1, $limit = 10)
    {
        $sql = $this->buildSearch($countryCode, $deviceTypeId, $deviceBrandId, $browserId, $referrerId, $osId);

        // Pagination
        $page = ($page - 1) * $limit;
        $sql .= " LIMIT $page,$limit";

        // Execute
        $result = $this->db->query($sql);

        // Return results
        return $result->fetchAll();
    }

    private function buildSearch($countryCode = null, $deviceTypeId = null, $deviceBrandId = null, $browserId = null, $referrerId = null, $osId = null)
    {
        // Build filters
        $where = [];

        if (!empty($countryCode))
            $where['countries.ISO'] = $this->db->quote(strtoupper($countryCode));

        if (!empty($deviceTypeId) && is_numeric($deviceTypeId))
            $where['device_types.ID'] = $deviceTypeId;

        if (!empty($deviceBrandId) && is_numeric($deviceBrandId))
            $where['device_brands.ID'] = $deviceBrandId;

        if (!empty($browserId) && is_numeric($browserId))
            $where['browsers.ID'] = $browserId;

        if (!empty($referrerId) && is_numeric($referrerId))
            $where['referrers.ID'] = $referrerId;

        if (!empty($osId) && is_numeric($osId))
            $where['operating_systems.ID'] = $osId;

        // Base SQL
        $sql = "SELECT visits.id,
                       DATE_FORMAT(visits.visit_date, '%Y-%m-%d') AS visitDate,
                       DATE_FORMAT(visits.visit_time, '%H:%i:%s') AS visitTime,
                       visits.ip_address AS ipAddress,
                       countries.CountryName AS countryName,
                       device_types.name AS deviceType,
                       device_brands.name AS deviceBrand,
                       browsers.name AS browserName,
                       referrers.name AS referrerName,
                       operating_systems.name AS operatingSystem
                FROM visits
                    JOIN countries ON visits.country_code = countries.ISO
                    JOIN device_types ON visits.device_type_id = device_types.ID
                    JOIN device_brands ON visits.device_brand_id = device_brands.ID
                    JOIN browsers ON visits.browser_id = browsers.ID
                    JOIN referrers ON visits.referrer_id = referrers.id
                    JOIN operating_systems ON visits.os_id = operating_systems.ID";

        // Convert filters to proper where clause
        if (count($where) > 0) {
            foreach ($where as $k => $v)
                $where[$k] = "$k = $v";

            $sql .= " WHERE " . implode(" AND ", $where);
        }

        $sql .= " ORDER BY visitDate, visitTime";

        return $sql;
    }
}