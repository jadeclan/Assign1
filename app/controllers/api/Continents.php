<?php
namespace Application;

use Framework\APIController;
class Continents extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Continents');

        $this->model = new ContinentsModel();
    }

    public function get()
    {
        if (count($this->arguments) > 0)
            return $this->model->getByContinentCode($this->arguments[0]);
        else
            return $this->model->getAll();
    }
}