<?php
namespace Core;

require_once 'EntityBase.php';

use Core as Core;

class ControllerBase {

    private $entityBase;

    public function __construct() {
        // require_once 'ModeloBase.php';
        $this->entityBase = new Core\EntityBase("u");
        //Incluir todos los modelos
        foreach(glob("models/*.php") as $file){
            require_once $file;
        }
    }

    //Plugins y funcionalidades

/*
* Este método lo que hace es recibir los datos del controlador en forma de array
* los recorre y crea una variable dinámica con el indice asociativo y le da el
* valor que contiene dicha posición del array, luego carga los helpers para las
* vistas y carga la vista que le llega como parámetro. En resumen un método para
* renderizar vistas.
*/
    public function view($view,$data){
        foreach ($data as $id_assoc => $valor) {
            ${$id_assoc}=$valor;
        }

        require_once 'HelperView.php';
        $helper = new Core\HelperView();
        require_once 'wwwroot\static_files.php';

        require_once 'views/'.$view.'View.php';
    }

    public function redirect($controlador = DEFAULT_CONTROLLER, $accion = DEFAULT_ACTION){
        header("Location:index.php?controller=".$controlador."&action=".$accion);
    }

    //Métodos para los controladores

}
?>
