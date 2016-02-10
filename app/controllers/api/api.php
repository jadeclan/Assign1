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
            new OperatingSystems()
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
            return json_encode($this->model->getByCountryCode($this->arguments[0]));
        else
            return json_encode($this->model->getAll());
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
        return json_encode($this->model->getAll());
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
        return json_encode($this->model->getAll());
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
        return json_encode($this->model->getAll());
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
        return json_encode($this->model->getAll());
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
        return json_encode($this->model->getAll());
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
            $deviceBrand = $_GET['browser'];

        $referrer = null;
        if (isset($_GET['referrer']))
            $deviceBrand = $_GET['referrer'];

        $os = null;
        if (isset($_GET['os']))
            $deviceBrand = $_GET['os'];

        $page = 1;
        if (isset($_GET['page']))
            $page = $_GET['page'];

        $limit = 100;
        if (isset($_GET['limit']))
            $limit = $_GET['limit'];

        $visits = $this->model->search($country, $deviceType, $deviceBrand, $browser, $referrer, $os, $page, $limit);

        return json_encode($visits);
    }
}
