<?php
namespace Controllers;

require_once "core/ControllerBase.php";
require_once "core/HelperView.php";

use Core as Core;

class ErrorController extends Core\ControllerBase {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
      $helperView = new Core\HelperView();
      $this->view("Error", array(
        "error_msg" => "No puedes eliminar un usuario con Goods!",
        "back_to" => $helperView->url("User", 'index')
      ));
    }
}
?>
