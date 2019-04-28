<?php
namespace Models;

use Core as Core;
class Good extends Core\EntityBase {

    private $goodId;
    private $goodName;
    private $goodDescription;
    private $goodValue;
    private $goodUser;

    public function __construct()
    {
      parent::__construct();
    }

    public function getId() {
        return $this->goodId;
    }

    public function getGoodUser() {
        return $this->goodUser;
    }

    public function setGoodUser($goodUser) {
        $this->goodUser = $goodUser;
    }

    public function getGoodName() {
        return $this->goodName;
    }

    public function setGoodName($goodName) {
        $this->goodName = $goodName;
    }

    public function getGoodDescription() {
        return $this->goodDescription;
    }

    public function setGoodDescription($goodDescription) {
        $this->goodDescription = $goodDescription;
    }

    public function getGoodValue() {
        return $this->goodValue;
    }

    public function setGoodValue($goodValue) {
        $this->goodValue = $goodValue;
    }

    public function save(){
        $query = "INSERT INTO Good (goodName,goodDescription, goodValue, Usuario_idUsuario) VALUES('{$this->getGoodName()}', '{$this->getGoodDescription()}', '{$this->getGoodValue()}', '{$this->getGoodUser()}')";
        if (!$result = mysqli_query($this->db(), $query)) {
            echo "Query bad" . mysqli_error($this->db());die;
        }
    }

    public function update($id){
        $query = "UPDATE Good SET goodName = '{$this->getGoodName()}', goodDescription = '{$this->getGoodDescription()}', goodValue = '{$this->getGoodValue()}' WHERE idGood = $id";
        if (!$result = mysqli_query($this->db(), $query)) {
            echo "Query bad" . mysqli_error($this->db());die;
        }
    }

    public function getById($id){
      $resultSet = array();
      $result = mysqli_query($this->db(), "SELECT * FROM Good WHERE idGood = $id");
      $resultSet = mysqli_fetch_assoc($result);
      return $resultSet;
    }

    public function deleteById($id){
      mysqli_query($this->db(), "DELETE FROM Good WHERE idGood = $id");
    }

    public function getAllByUsers($userId = NULL)
    {
      $resultSet = array();
      $query_user = "SELECT idUser, UserNick FROM User";
      $query_goods = "SELECT
      `g`.`idGood`,
      `g`.`GoodName`,
      `g`.`GoodDescription`,
      `g`.`GoodValue`,
      `u`.`UserNick` AS `UserNick`,
      `u`.`idUser` AS `idUser`
      FROM
      Good AS `g`
      INNER JOIN (
        $query_user
      ) AS `u`
      ON `u`.`idUser` = `g`.`Usuario_idUsuario`";
      if ($userId != NULL) {
        $query_goods .= "WHERE `u`.`idUser` = '{$userId}'";
      }
      if ($result = mysqli_query($this->db(), $query_goods)) {
        //Devolvemos el resultset en forma de array asociativo
        while ($row = mysqli_fetch_assoc($result)) {
           $resultSet[] = $row;
        }
      }

      return $resultSet;

    }

    public function getUsersWithPositionUser(){
      $resultSet = array();
      $query_users = "SELECT idUser, UserNick FROM User WHERE Position_idPosition = 2";
      if ($result = mysqli_query($this->db(), $query_users)) {
        //Devolvemos el resultset en forma de array asociativo
        while ($row = mysqli_fetch_assoc($result)) {
           $resultSet[] = $row;
        }
      }
      return $resultSet;
    }

}
?>
