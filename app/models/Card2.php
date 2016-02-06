<?php

namespace Application;

use Framework\Model;
use Framework\View;
use FRamework\Controller;
class Card2Model extends Model implements \JsonSerializable
{
    public function getDeviceBrandUsage() {
        $result = self::$db->query("SELECT device_brands.name as deviceBrand, count(*) as hits
                                    From visits
                                    join device_brands on device_brands.ID=visits.device_brand_id
                                    group by device_brands.name");

        return $result->fetchAll();
    }

    /**
     * @return array of serialized data
     */
    public function jsonSerialize(){
        return [
            'deviceBrand' => $this->deviceBrand,
            'hits' => $this->hits
        ];
    }
}