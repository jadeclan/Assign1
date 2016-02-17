<?php

namespace Application;

use Framework\Model;


/**
 * The Card1Dash2Model class. Extends the model class (Database Access)
 * Provides the functionality to query the database
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
class Card1Dash2Model extends Model
{
    public function search()
    {
        $sql = $this->buildSearch();

        // Execute
        $result = $this->db->query($sql);

        // Return results

        return $result->fetchAll();
    }

    private function buildSearch()
    {
        $sql = "SELECT browsers.id as id, name, count(*) AS hits,
                ((count(*)/(SELECT count(*) FROM visits)) * 100) AS percentage
                FROM browsers
                JOIN visits ON browsers.id = visits.browser_id";

        $sql .= " GROUP BY name";

        return $sql;
    }
}