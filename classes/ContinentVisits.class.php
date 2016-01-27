<?php
/*
   Represents a single row for the ContinentVisits table.

   This a concrete implementation of the Domain Model pattern.
 *
 * Created by PhpStorm.
 * User: james
 * Date: 26/01/16
 * Time: 7:58 PM
 */
class ContinentVisits extends DomainObject implements JsonSerializable
{

    static function getFieldNames() {
        return array('continentName','countryName','hits');
    }

    public function __construct(array $data, $generateExc)
    {
        parent::__construct($data, $generateExc);
    }

    // implement any setters that need input checking/validation
    public function jsonSerialize () {
        return array(
            'continentName'=>$this->continentName,
            'countryName'=>$this->countryName,
            'hits'=>$this->hits,
        );
    }
}

?>