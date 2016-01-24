<?php
/*
  Table Data Gateway for the BrowserHits table.
 */
class BrowserHitsTableGateway extends TableDataGateway
{
   public function __construct($dbAdapter)
   {
      parent::__construct($dbAdapter);
   }

   protected function getDomainObjectClassName()
   {
      return "BrowserHits";
   }
   protected function getTableName()
   {
      return "browsers";
   }
   protected function getOrderFields()
   {
      return 'percentage';
   }

   protected function getPrimaryKeyName() {
      return "id";
   }
    protected function getSelectStatement(){
          return $this->getSQLwithJoins();
    }

   private function getSQLwithJoins() {
      $sql  = "select browsers.id, name, count(*) as hits, ";
      $sql .= "((count(*)/(select count(*) from visits)) * 100) as percentage ";
      $sql .= "from browsers inner join visits on browsers.id=visits.browser_id ";
      $sql .= "group by name";
      return $sql;
   }

   public function findById($id){
     $sql  = "select browsers.id, name, count(*) as hits, ";
     $sql .= "((count(*)/(select count(*) from visits)) * 100) as percentage ";
     $sql .= "from browsers inner join visits on browsers.id=visits.browser_id ";
     $sql .= " WHERE browsers.id=:id";
     return $this->convertRowToObject($this->dbAdapter->fetchRow($sql, Array(':id' => $id)));
   }
}
?>