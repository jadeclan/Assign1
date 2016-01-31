<?php

namespace Application;

use Framework\Model;
use Framework\Controller;
use Framework\View;

class Card1Model extends Model
{
    public function getBrowserVisits() {
        $result = self::$db->query("SELECT browsers.id,
                                           name,
                                           count(*) AS visits,
                                           ((count(*)/(SELECT count(*) FROM visits)) * 100) AS percent
                                    FROM browsers
                                      JOIN visits ON browsers.id = visits.browser_id
                                    GROUP BY name");

        return $result->fetchAll();
    }
}

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