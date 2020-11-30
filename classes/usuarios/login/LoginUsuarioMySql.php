<?php

namespace usuarios\login;

class LoginUsuarioMySql implements LoginInterface {

    private $pdo;

    public function __construct() {

        $this->pdo = new \PDO("mysql:dbname=etext_db;host=localhost", "root", "");

    }

    public function verificarLogin(LoginUsuario $obj) {

        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $obj->getEmail());
        $sql->execute();

        if($sql->rowCount() > 0) {

            $dado = $sql->fetch();

            if(password_verify($obj->getSenha(), $dado["senha"])) {

                $_SESSION["id"] = $dado["senha"];

            } else {

                $_SESSION["alert"] = "Senha incorreta. Tente novamente.";
    
            }

        } else {

            $_SESSION["alert"] = "Email incorreto. Tente novamente.";

        }

    }

}