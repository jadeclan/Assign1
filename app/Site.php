<?php

namespace Application;

use Framework\Application;

use Framework\Model;
use Framework\View;
use Framework\Controller;

include "Card1.php";
include "Card2.php";
include "Card3.php";


/**
 * The Site class. This class will serve as the root of the controller hierarchy.
 * @author mark
 *
 */
class Site extends Application
{
    private $title = "POW-B Analytics";
    private $model;

    public function __construct()
    {
        // Initialize our model
        $this->model = new SiteModel();

        // Initialize Controllers
        parent::__construct('Site', [
            new Header(),
            new Footer(),
            new Card1(),
            new Card2(),
            new Card3(),
        ]);
    }

    public function Content()
    {
        return new View('Index.tpl', [
            'themedir' => View::getTemplatePath(),
            'title' => $this->title
        ]);
    }
}

class Header extends Controller
{
    public function __construct()
    {
        parent::__construct('Header');
    }

    public function Content()
    {
        return new View('Header.tpl');
    }
}

class Footer extends Controller
{
    public function __construct()
    {
        parent::__construct('Footer');
    }

    public function Content()
    {
        return new View('Footer.tpl');
    }
}

class SiteModel extends Model
{
    public function __construct()
    {
        parent::__construct(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }
}