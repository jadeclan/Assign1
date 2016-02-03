<?php
namespace Application;

use Framework\Model;
use Framework\Controller;
use Framework\View;

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
/*
 * Function card1.  creates the Card1 controller class,
 * instantiates it with the Card1Model and includes the
 * Card1 view.
 */
class Card1 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card1');

        $this->model = new Card1Model();
    }

    public function Content()
    {
        return new View('Card1.tpl', [
            'browsers' => $this->model->getBrowserVisits()
        ]);
    }
}