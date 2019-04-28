<?php
session_start();
use Core as Core;
//Configuración global
require_once 'config/global.php';
//Base para los controladores
require_once 'core/ControllerBase.php';
//Funciones para el controlador frontal
require_once 'core/ControllerUtil.php';

//Cargamos controladores y acciones
$action = $_GET['action'] ?? '';
$controller = $_GET['controller'] ?? '';

if (empty($_SESSION) and $action != "checkLogin") {
  $controller = Core\ControllerUtil::loadController("User");
  $_GET["action"] = "login"; // si pasa el parámetro action en la url sera reemplazado
  Core\ControllerUtil::runAction($controller);
} else {
  if ($controller != '' and $action != '') {
    if ($controller == 'User' and $action == 'login') {
      $controller = Core\ControllerUtil::loadController("Good");
      $_GET["action"] = "index"; // si pasa el parámetro action en la url sera reemplazado
      Core\ControllerUtil::runAction($controller);
    } else {
      $controller = Core\ControllerUtil::loadController($controller);
      Core\ControllerUtil::runAction($controller);
    }
  } else {
    $controller = Core\ControllerUtil::loadController("Good");
    $_GET["action"] = "index"; // si pasa el parámetro action en la url sera reemplazado
    Core\ControllerUtil::runAction($controller);
  }
}
?>
