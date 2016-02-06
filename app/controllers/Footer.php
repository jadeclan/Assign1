<?php

namespace Application;

use Framework\View;
use Framework\Controller;

/*
 * Constructs the Footer function from the footer.tpl file
 * tpl file must be in the theme/default directory
 */
class Footer extends Controller
{
    public function __construct()
    {
        parent::__construct('Footer');
    }

    // function used by controller to include the view
    public function Content()
    {
        return new View('Footer.tpl');
    }
}