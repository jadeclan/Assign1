<?php

namespace Application;

use Framework\View;
use Framework\Controller;

/*
 * Constructs the Header function from the header.tpl file
 * tpl file must be in the theme/default directory
 */
class Header extends Controller
{
    public function __construct()
    {
        parent::__construct('Header');
    }

    // function used by controller to include the view
    public function Content()
    {
        return new View('Header.tpl', [
            'nav' => $this->getRoot()->getNavLinks()
        ]);
    }
}