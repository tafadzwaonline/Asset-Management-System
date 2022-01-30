<?php

class Assets{

    private $db;

	function __construct($db){

		$this->_db = $db;

	}
  public function getPurchasePrice($id) {
    try {

      $stmt = $this->_db->prepare("SELECT PurchasePrice FROM new_item WHERE Id = :Id");
      $stmt->execute(array('Id' => $id));
      $row = $stmt->fetch();

     return $row['PurchasePrice'];

    } catch(PDOException $e) {
        echo '<p class="error">'.$e->getMessage().'</p>';
    }
  }
  public function getSalvageValue($id) {
    try {

      $stmt = $this->_db->prepare("SELECT ScrapValue FROM new_item WHERE Id = :Id");
      $stmt->execute(array('Id' => $id));
      $row = $stmt->fetch();

     return $row['ScrapValue'];

    } catch(PDOException $e) {
        echo '<p class="error">'.$e->getMessage().'</p>';
    }
  }
  public function getAssetLife($id) {
    try {

      $stmt = $this->_db->prepare("SELECT ExpectedAssetLife FROM new_item WHERE Id = :Id");
      $stmt->execute(array('Id' => $id));
      $row = $stmt->fetch();

     return $row['ExpectedAssetLife'];

    } catch(PDOException $e) {
        echo '<p class="error">'.$e->getMessage().'</p>';
    }
  }
  public function getCustodian($SerialNum) {
    try {

      $stmt = $this->_db->prepare("SELECT AssignedUser FROM assigneditems WHERE SerialNumber = :Id");
      $stmt->execute(array('Id' => $SerialNum));
      $row = $stmt->fetch();

     return $row['AssignedUser'];

    } catch(PDOException $e) {
        echo '<p class="error">'.$e->getMessage().'</p>';
    }
  }



}

?>
