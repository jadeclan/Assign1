<?php
namespace Application;

use Framework\APIController;
class TopTen extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('TopTen');

        $this->model = new CountryModel();
    }

    public function get()
    {
        return $this->model->getTopTen();
    }
}