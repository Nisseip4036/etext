<?php
session_start();

if(!isset($_SESSION["id"]) && empty($_SESSION["id"])) {

    header("Location: login.php");
    exit;

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-TEXT</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no"/>
</head>

<body>
    <h1>Bem vindo ao E-TEXT</h1>
</body>
</html>