<?php

namespace Application;

use Framework\Model;
use Framework\View;
use Framework\Controller;

class Card3 extends Controller
{
    public function __construct()
    {
        parent::__construct('Card3');
    }

    public function Content(Model $m = null)
    {
        return new View('Card3.tpl');
    }
}