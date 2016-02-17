<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/6/16
 * Time: 5:01 PM
 */

namespace Application;

use RuntimeException;

use Framework\Controller;
use Framework\APIController;

require_once "app/models/Country.php";
require_once "app/models/DeviceType.php";
require_once "app/models/DeviceBrand.php";
require_once "app/models/Browser.php";
require_once "app/models/Referrer.php";
require_once "app/models/OperatingSystem.php";
require_once "app/models/Chart1Model.php";
require_once "app/models/Chart2Model.php";
//require_once "app/models/Chart3Model.php";
require_once "app/models/Card1Dash2Model.php";
require_once "app/models/Card2Dash2Model.php";
require_once "app/models/Card3Dash2Model.php";
require_once "app/models/Continent.php";

require_once "app/models/Visit.php";

class API extends Controller
{
    public function __construct()
    {
        parent::__construct('API', [
            new Visits(),
            new Countries(),
            new DeviceTypes(),
            new DeviceBrands(),
            new Browsers(),
            new Referrers(),
            new OperatingSystems(),
            new Chart1B(),
            new Chart2B(),
//            new Chart3B(),
            new Card1D2(),
            new Card2D2(),
            new Card3D2(),
            new Continents(),
        ]);
    }

    public function Content()
    {
        throw new RuntimeException("attempted to route api stub");
    }
}

class Countries extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Countries');

        $this->model = new CountryModel();
    }

    public function get()
    {
        if (count($this->arguments) > 0)
            return $this->model->getByCountryCode($this->arguments[0]);
        else
            return $this->model->getAll();
    }
}


class DeviceTypes extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('DeviceTypes');

        $this->model = new DeviceTypeModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}

class DeviceBrands extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('DeviceBrands');

        $this->model = new DeviceBrandModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}

class Browsers extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Browsers');

        $this->model = new BrowserModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}

class Referrers extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Referrers');

        $this->model = new ReferrerModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}

class OperatingSystems extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('os');

        $this->model = new OperatingSystemModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}

class Visits extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Visits');

        $this->model = new VisitModel();
    }

    public function get()
    {
        $country = null;
        if (isset($_GET['country']))
            $country = $_GET['country'];

        $deviceType = null;
        if (isset($_GET['deviceType']))
            $deviceType = $_GET['deviceType'];

        $deviceBrand = null;
        if (isset($_GET['deviceBrand']))
            $deviceBrand = $_GET['deviceBrand'];

        $browser = null;
        if (isset($_GET['browser']))
            $browser = $_GET['browser'];

        $referrer = null;
        if (isset($_GET['referrer']))
            $referrer = $_GET['referrer'];

        $os = null;
        if (isset($_GET['os']))
            $os = $_GET['os'];

        $page = 1;
        if (isset($_GET['page']) && is_numeric($_GET['page']))
            $page = $_GET['page'];

        $limit = 10;
        if (isset($_GET['limit']) && is_numeric($_GET['limit']))
            $limit = $_GET['limit'];

        return $this->model->search($country, $deviceType, $deviceBrand, $browser, $referrer, $os, $page, $limit);
    }

}
class Chart1B extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Chart1');

        $this->model = new Chart1Model();
    }

    public function get()
    {
        $year = 2016;
        if (isset($_GET['year']) && is_numeric($_GET['year']))
            $year = $_GET['year'];

        $month = 1;
        if (isset($_GET['month']) && is_numeric($_GET['month'])  && $_GET['month']>0 && $_GET['month']<13)
            $month = $_GET['month'];

        return $this->model->search($year, $month);
    }
}

class Chart2B extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Chart2');

        $this->model = new Chart2Model();
    }

    public function get()
    {
        $year = 2016;
        if (isset($_GET['year']) && is_numeric($_GET['year']))
            $year = $_GET['year'];

        $month = 1;
        if (isset($_GET['month']) && is_numeric($_GET['month'])  && $_GET['month']>0 && $_GET['month']<13)
            $month = $_GET['month'];

        return $this->model->search($year, $month);
    }
}

//class Chart3B extends APIController
//{
//    private $model;
//
//    public function __construct()
//    {
//        parent::__construct('Chart3');
//
//        $this->model = new Chart3Model();
//    }
//
//    public function get()
//    {
//        $year = 2016;
//        if (isset($_GET['year']) && is_numeric($_GET['year']))
//            $year = $_GET['year'];
//
//        $month = 1;
//        if (isset($_GET['month']) && is_numeric($_GET['month'])  && $_GET['month']>0 && $_GET['month']<13)
//            $month = $_GET['month'];
//
//        return $this->model->search($year, $month);
//    }
//}

class Card1D2 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card1Dash2');

        $this->model = new Card1Dash2Model();
    }

    public function get()
    {
        return $this->model->search();
    }
}

class Card2D2 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card2Dash2');

        $this->model = new Card2Dash2Model();
    }

    public function get()
    {
        $brand='';
        if (isset($_GET['brand']))
            $brand = $_GET['brand'];

        return $this->model->search($brand);
    }
}

class Card3D2 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card3Dash2');

        $this->model = new Card3Dash2Model();
    }

    public function get()
    {
        $country = '';
        if (isset($_GET['country']))
            $country = $_GET['country'];
        return $this->model->search($country);
    }
}

class Continents extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Continents');

        $this->model = new ContinentsModel();
    }

    public function get()
    {
        if (count($this->arguments) > 0)
            return $this->model->getByContinentCode($this->arguments[0]);
        else
            return $this->model->getAll();
    }
}