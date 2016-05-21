<?php

class App{
    //VEM DA URL
    private $met, $clazz;
    
    public function __construct($met,$clazz){
        $this->met = $met;
        $this->clazz = $clazz;
    }
    
    public function startApp(){
        $clazzName = ucfirst($this->clazz)."Controller";
        require_once "model/UsuarioModel.php";
        require_once "model/UsuarioDAO.php";
        require_once "controller/Controller.php";
        $fileName = "controller/".$clazzName.".php";
        if(file_exists($fileName)){
            require_once $fileName;
            $c = new $clazzName();
            $met= $this->met;
            $c->$met();
        }else{
            require_once "controller/HomeController.php";
            $c=new HomeController();
            $c->call();
        }
    }
}

session_start();
require_once "view/View.php";

$met = $_GET["metodo"];
$clazz = $_GET["classe"];
$r = new App($met,$clazz);
$r->startApp();

?>