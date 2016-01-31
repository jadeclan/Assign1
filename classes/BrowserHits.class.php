<?php
/*
   Represents a single row for the BrowserHits table.

   This a concrete implementation of the Domain Model pattern.
 */
class BrowserHits extends DomainObject implements JsonSerializable{

   static function getFieldNames() {
      return array('id','name','hits'.'percentage');
   }

   public function __construct(array $data, $generateExc)
   {
      parent::__construct($data, $generateExc);
   }

   // implement any setters that need input checking/validation
  public function jsonSerialize () {
       return array(
           'id'=>$this->id,
           'name'=>$this->name,
           'hits'=>$this->hits,
           'percentage'=>$this->percentage
       );
   }
}