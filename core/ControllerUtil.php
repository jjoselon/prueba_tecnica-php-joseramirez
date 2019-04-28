<?php
namespace Core;

use Controllers as Controllers;

class ControllerUtil {

  public static function loadController($controller) {
    $controller = ucwords($controller).'Controller';
    $strPathController = 'controllers/'.$controller.'.php';

    if(!is_file($strPathController)){
      $strPathController = 'controllers/'.ucwords(DEFAULT_CONTROLLER).'Controller.php';
    } else {
      // 404
    }
    $controller = "Controllers\\$controller";
    $varvar = 'controller';
    require_once $strPathController;
    return new $$varvar;
  }

  public static function loadAction($controller,$action){
    $accion = $action;
    $controller->$accion();
  }

  public static function runAction($controller){
    if(isset($_GET["action"]) && method_exists($controller, $_GET["action"])){
      self::loadAction($controller, $_GET["action"]);
    }else{
      self::loadAction($controller, DEFAULT_ACTION);
    }
  }

}



?>
