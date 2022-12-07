<?php

include "config/config.php";
include "config/DLL.php";
if (!isset($_SESSION)) session_start();
teste_login($_SESSION['sess_aut'], $local);


?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Propria</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <h2>Nova casa</h2>
    <form action="enviaXML.php" method="post">

        <div class="input-field">
            <input type="text" name="tamanhoCasa"
                   placeholder="Tamanho da casa">
            <div class="underline"></div>
        </div>

        <div class="input-field">
            <input type="text" name="valorVenda"
                   placeholder="Valor da venda">
            <div class="underline"></div>
        </div>

        <div class="input-field">
            <input type="text" name="sinalTotal"
                   placeholder="Sinal total">
            <div class="underline"></div>
        </div>

        <div class="input-field">
            <input type="text" name="numeroPrestacoes"
                   placeholder="Numero de prestações">
            <div class="underline"></div>
        </div>

        <div class="input-field">
            <input type="text" name="valorPrestacoes"
                   placeholder="Valor das prestações">
            <div class="underline"></div>
        </div>

        <input type="submit" name="save" value="Salvar"/>
        <input type = "submit" value="Sair" name="BSair"/>

    </form>
</main>
</body>
</html>



