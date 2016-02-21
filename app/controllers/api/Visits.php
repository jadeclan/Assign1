<?php
namespace Application;

use Framework\APIController;
class Visits extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Visits');

        $this->model = new VisitModel();
    }

    public function get()
    {
        $country = null;
        if (isset($_GET['country']))
            $country = $_GET['country'];

        $deviceType = null;
        if (isset($_GET['deviceType']))
            $deviceType = $_GET['deviceType'];

        $deviceBrand = null;
        if (isset($_GET['deviceBrand']))
            $deviceBrand = $_GET['deviceBrand'];

        $browser = null;
        if (isset($_GET['browser']))
            $browser = $_GET['browser'];

        $referrer = null;
        if (isset($_GET['referrer']))
            $referrer = $_GET['referrer'];

        $os = null;
        if (isset($_GET['os']))
            $os = $_GET['os'];

        $page = 1;
        if (isset($_GET['page']) && is_numeric($_GET['page']))
            $page = $_GET['page'];

        $limit = 10;
        if (isset($_GET['limit']) && is_numeric($_GET['limit']))
            $limit = $_GET['limit'];

        return $this->model->search($country, $deviceType, $deviceBrand, $browser, $referrer, $os, $page, $limit);
    }

}