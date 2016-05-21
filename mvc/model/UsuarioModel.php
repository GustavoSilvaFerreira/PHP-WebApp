<?php

class UsuarioModel{
    private $id, $nome, $login, $senha;
    
    public function __construct($id=0, $nome, $login, $senha){
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
}

?>