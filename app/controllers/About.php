<?php

namespace Application;

use Framework\Model;
use Framework\View;
use Framework\Controller;

use Framework\Navable;

class About extends Controller implements Navable
{
    public function __construct()
    {
        parent::__construct('About');
    }

    public function getNavString()
    {
        return "About";
    }

    public function Content()
    {
        return new View('About.tpl');
    }
}