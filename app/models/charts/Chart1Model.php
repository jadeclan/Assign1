<?php

namespace Application;

use Framework\Model;
/**
 * The Chart1Model class. Extends the model class (Database Access)
 * Provides the functionality to query the database
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
class Chart1Model extends Model
{
    public function search($year = 2016, $month = 1)
    {
             $sql = $this->buildSearch($year, $month);

             // Execute
             $result = $this->db->query($sql)->fetchAll();

             return $result;
    }

    private function buildSearch($year = 2016, $month = 1)
    {
        // Build filters (includes year flexibility)
        $where = [];
        $where['EXTRACT(YEAR FROM visits.visit_date)'] = $year;
        $where['EXTRACT(MONTH FROM visits.visit_date)'] = $month;

        $sql = "SELECT EXTRACT(DAY FROM visit_date) as day,
                       count(*) as monthDailyVisits
                FROM visits";

        // Convert filters to proper where clause
        if (count($where) > 0) {
            foreach ($where as $k => $v)
                    $where[$k] = "$k = $v";

                    $sql .= " WHERE " . implode(" AND ", $where);
        }

        $sql .= " GROUP BY day";
        $sql .= " ORDER BY day";

        return $sql;
    }
}