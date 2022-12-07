<?php
include "../config/config.php";
include "../config/DLL.php";
if(!isset($_SESSION)) session_start();

$email = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);

$consulta = "SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
$sql = banco($server, $user, $password, $db, $consulta);

//Econtrado usuario com esse e-mail
if (($sql) and ($sql->num_rows != 0)) {

    $fullName = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_STRING);

    $_SESSION['fullName'] = $fullName;
    $resultado = '../index.php';

    echo $resultado;
} else { //Nenhum usuário encontrado
    $resultado = 'erro';

    echo (json_encode($resultado));
}