<?php
namespace Controllers;

require_once "core/ControllerBase.php";

use Core as Core;
use Models\User;

class UserController extends Core\ControllerBase {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
      $user = new User();
      //Cargamos la vista index y le pasamos valores
      $this->view("AllUsers",array(
        "all_users" => $user->getAll(),
      ));
    }

    public function login() {
      $this->view("formAuthenticationUser",array());
    }

    public function logout() {
      $this->view("UnAuthenticationUser",array());
    }

    public function checkLogin() {
      $user = new User();
      if (empty($userFound = $user->findUser($_POST["nickname"], $_POST["password"]))) {
        $this->view("formAuthenticationUser",array(
          "bad_credentials" => "Credenciales incorrectas"
        ));
        return;
      }
      $_SESSION["logged"] = true;
      $_SESSION["position"] = $userFound["PositionName"];
      $_SESSION["nickname"] = $userFound["UserNick"];
      $_SESSION["idUser"] = $userFound["idUser"];
      $this->redirect("Good", "index");


    }

    public function showFormRegistrationUser()
    {
      $this->view("formRegistrationUser",array());
    }

    public function create(){
        if(isset($_POST["nickname"])){
            //Creamos un usuario
            $user = new User();
            $user->setNick($_POST["nickname"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->save();
        }

        $this->redirect("User", "index");
    }

    public function get()
    {
      if(isset($_GET["id"])){
        $user = new User;
        $this->view("DetailUser",array(
          "user"=> $user->getById($_GET["id"]),
        ));
      }
    }

    public function delete(){
        if(isset($_POST["idUser"])){
            $user = new User();
            if (!$user->deleteById($_POST["idUser"])) {
              $this->redirect("Error", "index");
              return;
            }
        }
        $this->redirect("User", "index");
    }

    public function put(){
      $user = new User();
      if(isset($_POST["idUser"])){
        $user->setNick($_POST["nickname"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->update($_POST["idUser"]);
        $this->redirect("User", "index");
      }
      if (isset($_GET["id"])) {
        $this->view("formEditUser",array(
          "user" => $user->getById($_GET["id"])
        ));
      }
    }
}
?>
