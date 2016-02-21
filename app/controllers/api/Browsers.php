<?php
namespace Application\API\Controller;

use Framework\APIController;
use Application\API\Model;
class Browsers extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Browsers');

        $this->model = new Model\BrowserModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}