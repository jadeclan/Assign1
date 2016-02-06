<?php

namespace Application;

use Framework\View;
use Framework\Controller;
use Framework\Navable;
/**
 * The Documentation class. Extends the controller class
 * Provides the functionality to build a view of the documentation
 * page.
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
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