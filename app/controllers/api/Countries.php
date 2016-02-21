<?php
namespace Application;

use Framework\APIController;
class Countries extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Countries',[
                new TopTen()]
        );

        $this->model = new CountryModel();
    }

    public function get()
    {
        if (count($this->arguments) > 0)
            return $this->model->getByCountryCode($this->arguments[0]);
        else
            return $this->model->getAll();
    }
}