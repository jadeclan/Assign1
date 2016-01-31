<?php

namespace Application;

use Framework\Model;
use Framework\View;
use FRamework\Controller;

class Card2 extends Controller
{
    public function __construct()
    {
        parent::__construct('Card2');
    }

    public function Content(Model $m = null)
    {
        return new View('Card2.tpl');
    }
}