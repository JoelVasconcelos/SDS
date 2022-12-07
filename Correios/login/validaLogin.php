<html>
    <head>
            <meta charset = "UTF-8">
             <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
   <body>
<?php
extract($_POST);
include "../config/config.php";
include "../config/DLL.php";
if(!isset($_SESSION)) session_start();

if (isset($Login)) {
    $consulta = "SELECT * FROM usuarios WHERE email ='$email'";
    $sql = banco($server, $user, $password, $db, $consulta);
    $linha = $sql->fetch_assoc();
    $pass = $linha["senha"];
    $senha = md5($senha);
    if ($senha == $pass) {
        $_SESSION['sess_aut'] = 'ok';
        $local = $local."index.php";
    }else{
        $local = $local."login/login.php";
    }
    header($local);
    exit;
 }

 if (isset($Inscrever)) {
        $senha = md5($senha);
        $consulta = "insert into usuarios (email,senha)values('$email','$senha')";
        banco($server, $user, $password, $db, $consulta);
         $local = $local."login/login.php";
         header($local);
        exit;
 }

 if (isset($BSair)){
    $_SESSION = array();
    $local = $local."login/login.php";
    header($local);
    exit;
 }
?>
   </body>
</html>