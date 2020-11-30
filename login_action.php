<?php

session_start();

require("autoload.php");

$email_usuario = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
$senha_usuario = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

if($email_usuario && $senha_usuario) {

    $login_usuario = new \usuarios\login\LoginUsuario();
    $login_usuario->setEmail($email_usuario);
    $login_usuario->setSenha($senha_usuario);

    $login_usuario_mysql = new \usuarios\login\LoginUsuarioMySql();
    $login_usuario_mysql->verificarLogin($login_usuario);

}

header("Location: index.php");
exit;