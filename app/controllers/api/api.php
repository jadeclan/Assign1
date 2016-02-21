<?php
namespace Application;

use RuntimeException;

use Framework\Controller;

require_once "Browsers.php";
require_once "Continents.php";
require_once "Countries.php";
require_once "DeviceBrands.php";
require_once "DeviceTypes.php";
require_once "OperatingSystems.php";
require_once "Referrers.php";
require_once "TopTen.php";
require_once "Visits.php";
require_once "dashboard2/Card3.php";
require_once "dashboard2/Card2.php";
require_once "dashboard2/Card1.php";
require_once "charts/Chart3.php";
require_once "charts/Chart2.php";
require_once "charts/Chart1.php";

require_once "app/models/Country.php";
require_once "app/models/DeviceType.php";
require_once "app/models/DeviceBrand.php";
require_once "app/models/Browser.php";
require_once "app/models/Referrer.php";
require_once "app/models/OperatingSystem.php";
require_once "app/models/charts/Chart1.php";
require_once "app/models/charts/Chart2.php";
require_once "app/models/charts/Chart3.php";
require_once "app/models/dashboard2/Card1.php";
require_once "app/models/dashboard2/Card2.php";
require_once "app/models/dashboard2/Card3.php";
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
            new API\Controller\Browsers(),
            new Referrers(),
            new OperatingSystems(),
            new API\Controller\Chart1(),
            new API\Controller\Chart2(),
            new API\Controller\Chart3(),
            new API\Controller\Card1(),
            new API\Controller\Card2(),
            new API\Controller\Card3(),
            new Continents(),
        ]);
    }

    public function Content()
    {
        throw new RuntimeException("attempted to route api stub");
    }
}