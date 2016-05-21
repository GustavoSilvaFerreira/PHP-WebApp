<?php
abstract class Controller{
    
    protected $view;
    
    public function __construct(){
        $this->view = new View();
    }
    public function estaAuth(){
        if(!isset($_SESSION["_ID"])){
            header("location:/usuario/login");
        }
    }
    public function __call($m,$a){
        $this->view->renderizar("erro");
    }
}
?>