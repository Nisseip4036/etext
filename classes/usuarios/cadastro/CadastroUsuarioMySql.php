<?php

namespace usuarios\cadastro;

class CadastroUsuarioMySql implements CadastroInterface {

    private $pdo;

    public function __construct() {

        $this->pdo = new \PDO("mysql:dbname=etext_db;host=localhost", "root", "");

    }

    public function verificarEmail($email) {

        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {

            return true;

        } else {

            return false;

        }

    }

    public function cadastrarUsuario(CadastroUsuario $obj) {

        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $sql->bindValue(":nome", $obj->getNome());
        $sql->bindValue(":email", $obj->getEmail());
        $sql->bindValue(":senha", $obj->getSenha());
        $sql->execute();

    }

}