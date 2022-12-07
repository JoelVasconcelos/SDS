<?php
include "config/config.php";
include "config/DLL.php";
if(!isset($_SESSION)) session_start();
teste_login($_SESSION['sess_aut'], $local);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreio</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<main class="container_incio">
    <H2>Rastreio Rastreavel Rastreador para Restreamento</H2>
    <form action="rastreio.php" method="POST">

        <div class="input-field">
            <input type="text" name="codigo" id="codigo"
                   placeholder="Codigo">
            <div class="underline"></div>
        </div>

        <input type="submit" value="Enviar" id="enviar">
    </form>

    <form method="post" action="login/validaLogin.php">
        <input type = "submit" value="Sair" name="BSair"/>
    </form>
</main>

</body>
</html>