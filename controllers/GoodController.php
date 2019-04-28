<?php
namespace Controllers;

require_once "core/ControllerBase.php";

use Core as Core;
use Models\Good;

class GoodController extends Core\ControllerBase {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
      $good = new Good();
      //Cargamos la vista index y le pasamos valores
      switch ($_SESSION["position"]) {
        case "admin": {
          $this->view("AllGoods",array(
            "all_goods" => $good->getAllByUsers(),
          ));
        }
        break;
        case "user": {
          $this->view("AllGoods",array(
            "all_goods" => $good->getAllByUsers($_SESSION["idUser"]),
          ));
        }
        break;
        default: {

        }
        break;
      }
    }

    public function showFormRegistrationGood()
    {
      $user = new Good();
      $this->view("formRegistrationGood",array(
        "users" => $user->getUsersWithPositionUser(),
      ));
    }

    public function create(){
        if(isset($_POST["name"])){
            //Creamos un usuario
            $good = new Good();
            $good->setGoodName($_POST["name"]);
            $good->setGoodDescription($_POST["description"]);
            $good->setGoodValue($_POST["value"]);
            $good->setGoodUser($_POST["user"] ?? $_SESSION['idUser']);
            $good->save();
            $_SESSION["flag_msg"] = "Good creado con exito.";
        }

        $this->redirect("Good", "index");
    }

    public function get()
    {
      if(isset($_GET["id"])){
        $good = new Good;
        $this->view("DetailGood",array(
          "good"=> $good->getById($_GET["id"]),
        ));
      }
    }

    public function delete(){
        if(isset($_POST["idGood"])){
            $good = new Good();
            $good->deleteById($_POST["idGood"]);
            $_SESSION["flag_msg"] = "Good eliminado con exito.";
        }
        $this->redirect("Good", "index");
    }

    public function put(){
      $good = new Good();
      if(isset($_POST["idGood"])){
        $good->setGoodName($_POST["name"]);
        $good->setGoodDescription($_POST["description"]);
        $good->setGoodValue($_POST["value"]);
        $good->update($_POST["idGood"]);
        $this->redirect("Good", "index");
      }
      if (isset($_GET["id"])) {
        $this->view("formEditGood",array(
          "good" => $good->getById($_GET["id"])
        ));
      }
    }
}
?>
