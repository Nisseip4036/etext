<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-TEXT - Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css"/>
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no"/>
</head>

<body>
    <div class="opacity">

        <?php

        if(isset($_SESSION["alert"]) && !empty($_SESSION["alert"])) {

            echo "<p class='alert'>".$_SESSION["alert"]."</p>";
            unset($_SESSION["alert"]);

        }
        
        ?>

        <div class="area_form">
            <h1>Login</h1>

            <form method="POST" action="login_action.php">
                <input type="email" name="email" placeholder="Email" required/>
                <input type="password" name="senha" placeholder="Senha" required/>
                <input class="form_input_submit" type="submit" value="Entrar"/>
            </form>

            <a href="cadastro.php">Não possui uma conta? Clique aqui!</a>
        </div>
    </div>
</body>
</html>