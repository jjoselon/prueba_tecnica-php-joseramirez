<?php
namespace Core;

class Connection {

    public function connect() {
      $con = mysqli_connect("localhost", "root", "", "mydb");
      mysqli_query($con, "SET NAMES utf8");
      return $con;
    }

}
?>
