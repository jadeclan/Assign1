<?php

namespace Application;

use Framework\Model;
use Framework\View;
use FRamework\Controller;

class About extends Controller
{
    public function __construct()
    {
        parent::__construct('About');
    }

    public function Content()
    {
        return new View('About.tpl');
    }
}