<?php
include "config.php";

Function teste_login($sessao,$local) {
    if($sessao != "ok"){
        $local = $local."login/login.html";
        header($local);
        exit;
    }
}

Function banco($server, $user, $password, $db, $consulta) {

    $banco =  new mysqli($server, $user, $password, $db);

    if ($banco->connect_error) {
        echo "Falha de conexão referência: (".$banco->connect_errno.") - ".$banco->connect_error;
        echo "<a href = 'novoIp.php'></a>";
        exit();
    }

    if (!$resultado = $banco->query($consulta)) {
        echo "Falha na consulta referência: (".$banco->errno.") - ".$banco->error;
        echo "<a href = 'novoIp.php'> </a>";
        exit();
    }

    $banco->close();
    return $resultado;
}
?>