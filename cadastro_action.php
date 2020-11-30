<?php

session_start();

require("autoload.php");

$nome_usuario = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$email_usuario = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
$senha_usuario = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

if($nome_usuario && $email_usuario && $senha_usuario) {

    $new_usuario_mysql = new \usuarios\cadastro\CadastroUsuarioMySql();    

    if(!$new_usuario_mysql->verificarEmail($email_usuario)) {

        $hash_usuario = password_hash($senha_usuario, PASSWORD_DEFAULT);

        $new_usuario = new \usuarios\cadastro\CadastroUsuario();
        $new_usuario->setNome($nome_usuario);
        $new_usuario->setEmail($email_usuario);
        $new_usuario->setSenha($hash_usuario);

        $new_usuario_mysql->cadastrarUsuario($new_usuario);

    } else {

        $_SESSION["alert"] = "E-mail já cadastrado. Tente novamente.";
        header("Location: cadastro.php");
        exit;

    }

}

header("Location: index.php");
exit;