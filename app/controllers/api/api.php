<?php
namespace Application;

use RuntimeException;

use Framework\Controller;
use Framework\APIController;

require_once "Browsers.php";
require_once "Continents.php";
require_once "Countries.php";
require_once "DeviceBrands.php";
require_once "DeviceTypes.php";
require_once "OperatingSystems.php";
require_once "Referrers.php";
require_once "TopTen.php";
require_once "Visits.php";
require_once "Card3D2.php";
require_once "Card2D2.php";
require_once "Card1D2.php";
require_once "Chart3B.php";
require_once "Chart2B.php";
require_once "Chart1B.php";

require_once "app/models/Country.php";
require_once "app/models/DeviceType.php";
require_once "app/models/DeviceBrand.php";
require_once "app/models/Browser.php";
require_once "app/models/Referrer.php";
require_once "app/models/OperatingSystem.php";
require_once "app/models/charts/Chart1Model.php";
require_once "app/models/charts/Chart2Model.php";
require_once "app/models/charts/Chart3Model.php";
require_once "app/models/dashboard2/Card1Dash2Model.php";
require_once "app/models/dashboard2/Card2Dash2Model.php";
require_once "app/models/dashboard2/Card3Dash2Model.php";
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
            new Chart3B(),
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