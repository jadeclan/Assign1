<?php

namespace Application;

use Framework\View;
use Framework\Controller;
use Framework\Navable;

include "Card1.php";
include "Card2.php";
include "Card3.php";

class Dashboard extends Controller implements Navable
{
    public function __construct()
    {
        parent::__construct('Dashboard', [
            new Card1(),
            new Card2(),
            new Card3()
        ]);
    }

    public function getNavString()
    {
        return "Dashboard";
    }

    public function Content()
    {
        return new View('Dashboard.tpl');
    }
}