<?php

namespace Application;

use Framework\Model;


/**
 * The Card1Model class. Extends the model class (Database Access)
 * Provides the functionality to query the database
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
class Card1Model extends Model
{
    public function getBrowserVisits() {
        $result = self::$db->query("SELECT browsers.id,
                                           name,
                                           count(*) AS hits,
                                           ((count(*)/(SELECT count(*) FROM visits)) * 100) AS percentage
                                    FROM browsers
                                      JOIN visits ON browsers.id = visits.browser_id
                                    GROUP BY name");

        return $result->fetchAll();
    }
}