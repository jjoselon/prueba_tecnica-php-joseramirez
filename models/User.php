<?php
namespace Models;

use Core as Core;
class User extends Core\EntityBase {

    private $idUser;
    private $userNick;
    private $userPassword;
    private $userEmail;

    public function __construct()
    {
      parent::__construct();
    }

    public function getId() {
        return $this->id;
    }

    public function getNick() {
        return $this->nick;
    }

    public function setNick($nick) {
        $this->nick = $nick;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getById($id){
      $resultSet = array();
      $result = mysqli_query($this->db(), "SELECT * FROM User WHERE idUser = $id");
      $resultSet = mysqli_fetch_assoc($result);
      return $resultSet;
    }

    public function deleteById($id){
      mysqli_query($this->db(), "DELETE FROM User WHERE idUser = $id");
      if (mysqli_errno($this->db()) == 1451) {
        return false;
      }
      return true;
    }

    public function save() {
      $query = "INSERT INTO User (UserNick, UserPassword, UserEmail, Position_idPosition) VALUES('{$this->getNick()}', '{$this->getPassword()}', '{$this->getEmail()}', 2)";
      if (!$result = mysqli_query($this->db(), $query)) {
        echo "Query bad" . mysqli_error($this->db());die;
      }
    }

    public function update($id){
        $query = "UPDATE User SET UserNick = '{$this->getNick()}', UserPassword = '{$this->getPassword()}', UserEmail = '{$this->getEmail()}' WHERE idUser = $id";
        if (!$result = mysqli_query($this->db(), $query)) {
            echo "Query bad" . mysqli_error($this->db());die;
        }
    }

    public function getAll(){
      $resultSet = array();
      $query_users = "SELECT idUser, UserNick, UserEmail FROM User WHERE idUser != '{$_SESSION['idUser']}'" ;
      if ($result = mysqli_query($this->db(), $query_users)) {
        //Devolvemos el resultset en forma de array asociativo
        while ($row = mysqli_fetch_assoc($result)) {
           $resultSet[] = $row;
        }
      }
      return $resultSet;
    }


    public function findUser($userNick, $userPassword) {
      $resultSet = array();
      $query = "SELECT
      `p`.`PositionName` AS `PositionName`,
      `u`.`UserNick` AS `UserNick`,
      `u`.`idUser` AS `idUser`
      FROM User AS `u`
      INNER JOIN (
        SELECT `PositionName`, `idPosition`
        FROM Position
      ) AS `p`
      ON `p`.`idPosition` = `u`.`Position_idPosition`
      WHERE `u`.`UserNick` = '{$userNick}' AND `u`.`UserPassword` = '{$userPassword}'";
      $result = mysqli_query($this->db(), $query);
      $resultSet = mysqli_fetch_assoc($result);
      return $resultSet;
    }

}
?>
