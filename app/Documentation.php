<?php

namespace Application;

use Framework\View;
use Framework\Controller;
use Framework\Navable;

class Documentation extends Controller implements Navable
{
    public function __construct()
    {
        parent::__construct('Documentation');
    }

    public function getNavString()
    {
        return "Documentation";
    }

    public function Content()
    {
        return new View('Documentation.tpl');
    }
}