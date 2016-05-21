<?php

class View{
    
    public function renderizar($pagina){
        require_once $pagina .".php";
    }
    public function interpolar($pagina,$dado){
        require_once $pagina .".php";
    }
}

?>