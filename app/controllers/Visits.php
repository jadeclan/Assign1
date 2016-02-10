<?php

namespace Application;

use Framework\Controller;
use Framework\Navable;
use Framework\View;
use Framework\Model;

class VisitBrowser extends Controller implements Navable
{
    public function __construct() {
        parent::__construct('Visits');
    }

    public function getNavString() {
        return $this->getName();
    }

    public function Content() {
        return new View('Visits.tpl');
    }
}