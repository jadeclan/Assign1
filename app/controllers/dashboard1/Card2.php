<?php

namespace Application;

require_once "app/models/dashboard1/Card2.php";

use Framework\View;
use FRamework\Controller;
/*
 * Class used to control the creation of Card2 from
 * the Card2Model and Card2 view.
 */
class Card2 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card2');

        $this->model = new Card2Model();
    }
    /*
     * Function to get content rendered by the card2 template
     * using data obtained from the Card2Model.
     */
    public function Content()
    {
        return new View('dashboard1/Card2.tpl', [
        'devices' => $this->model->getDeviceBrandUsage()
        ]);
    }
}