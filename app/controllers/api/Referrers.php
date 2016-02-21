<?php
namespace Application;

use Framework\APIController;
class Referrers extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Referrers');

        $this->model = new ReferrerModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}