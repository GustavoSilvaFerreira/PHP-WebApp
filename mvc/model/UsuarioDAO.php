<?php

class UsuarioDAO{
    public function insert(UsuarioModel $u){
        $mysqli = new mysqli("127.0.0.1", "gustavoferreira", "", "Teste");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO User(nome,login,senha) VALUES (?,?,?)");
        $stmt->bind_param("sss",$u->getNome(),$u->getLogin(),$u->getSenha());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
        return "";
    }
    
    public function getUsuario($id){
        $mysqli = new mysqli("127.0.0.1", "gustavoferreira", "", "Teste");
        $stmt = $mysqli->prepare("SELECT * FROM User WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$nome, $login,$senha);
        $stmt->fetch();
        $user = new UsuarioModel($id,$nome,$login, $senha);
        return $user;
    }
    public function authUser($login,$senha){
        $mysqli = new mysqli("127.0.0.1", "gustavoferreira", "", "Teste");
        $stmt = $mysqli->prepare("SELECT id FROM User WHERE login=? AND senha=?");
        $stmt->bind_param("ss",$login,$senha);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->fetch();
        if($id>0){
            return $id;
        }else{
            return false;
        }
    }
    //$stmt->bind_result($col1, $col2);
}

?>