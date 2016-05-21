<?php

class ProdutoDAO{
    public function insert(Produto $p){
        $mysqli = new mysqli("127.0.0.1", "gustavoferreira", "", "Simulado");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Produto(nome,valor) VALUES (?,?)");
        $stmt->bind_param("sd",$p->getNome(),$p->getValor());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    public function getProduct($id){
        $mysqli = new mysqli("127.0.0.1", "gustavoferreira", "", "Simulado");
        $stmt = $mysqli->prepare("SELECT * FROM Produto WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$nome, $valor);
        $stmt->fetch();
        $prod = new Produto($id,$nome,$valor);
        return $prod;
    }
    //$stmt->bind_result($col1, $col2);
}

?>