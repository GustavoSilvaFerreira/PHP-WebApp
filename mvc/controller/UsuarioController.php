<?php

class UsuarioController extends Controller{
    
    public function cadastro(){
        $this->view->renderizar("form");
    }
    public function insert(){
        $us = new UsuarioModel(0,$_POST["nome"],$_POST["login"],$_POST["senha"]);
        $usDAO = new UsuarioDAO();
        $usDAO->insert($us);
        //carrega a pagina cadastro
        header("location:/usuario/cadastro");
    }
    public function perfil(){
        $id = $_GET["arg0"];
        //PEGANDO DADOS DO MODEL
        $userDao = new UsuarioDAO();
        $usuario = $userDao->getUsuario($id);
        // -----------------------------
        // MANDANDO PARA VIEW
        $dado["nome"] = $usuario->getNome();
        $dado["login"] = $usuario->getLogin();
        $this->view->interpolar("Perfil",$dado);
        // ------------------------------
    }
    public function login(){
        unset($_SESSION["_ID"]);
        $this->view->renderizar("login");
    }
    public function logout(){
        $this->estaAuth();
        unset($_SESSION["_ID"]);
        $this->view->renderizar("logout");
    }
    public function auth(){
        $uDAO = new UsuarioDAO();
        $ehLoginCorreto = $uDAO->authUser($_POST["login"],$_POST["senha"]);
        if($ehLoginCorreto === false){
            header("Location: /usuario/login");
        }else{
            $_SESSION["_ID"] = $ehLoginCorreto;
            header("Location: /usuario/perfil/" . $ehLoginCorreto);
        }
    }
    
}

?>