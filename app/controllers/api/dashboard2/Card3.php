<?php
namespace Application\API\Controller;

use Framework\APIController;
use Application\API\Model;
class Card3D2 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card3Dash2');

        $this->model = new Model\Card3Dash2Model();
    }

    public function get()
    {
        $country = '';
        if (isset($_GET['country']))
            $country = $_GET['country'];
        return $this->model->search($country);
    }
}