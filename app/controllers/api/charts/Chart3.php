<?php
namespace Application\API\Controller;

use Framework\APIController;
use Application\API\Model;
class Chart3 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Chart3');

        $this->model = new Model\Chart3Model();
    }

    public function get()
    {
        $country1 = "";
        if ( isset($_GET['country1']) )
            $country1 = $_GET['country1'];

        $country2 = "";
        if ( isset($_GET['country2']) )
            $country2 = $_GET['country2'];

        $country3 = "";
        if ( isset($_GET['country3']) )
            $country3 = $_GET['country3'];

        return $this->model->search($country1, $country2, $country3);
    }
}