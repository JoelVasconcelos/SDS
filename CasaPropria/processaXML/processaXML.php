<?php
$page = $_SERVER['PHP_SELF'];
$sec = "5";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <title>Processando...</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php
//Homologação
$conn = mysqli_connect("localhost", "root", "", "casapropria");

//Produção
//$conn = mysqli_connect("sql212.epizy.com", "epiz_32675397", "testexmlinho", "epiz_32675397_db_xmlinho");
$file = 'gaveta/XMLinho.xml';

//mysqli_set_charset($conn, "uft8");
$affectedRow = 0;

if (file_exists($file)) {
    $xml = simplexml_load_file($file);
    unlink($file);
} else {
  echo "O arquivo $file não existe";
}


// Mapeamento de dados
foreach ($xml->children() as $row) {
    $tamanhoCasa = $row->tamanhoCasa;
    $valorVenda = $row->valorVenda;
    $sinalTotal = $row->sinalTotal;
    $numeroPrestacoes = $row->numeroPrestacoes;
    $valorPrestacoes = $row->valorPrestacoes;

// Perssitencia no banco de dados
    $sql = "INSERT INTO casas (tamanhoCasa, valorVenda,
		sinalTotal, numeroPrestacoes, valorPrestacoes) VALUES (
		'" . $tamanhoCasa . "',
        '" . $valorVenda . "',
        '" . $sinalTotal . "',
        '" . $numeroPrestacoes . "',
        '" . $valorPrestacoes . "')";

    $result = mysqli_query($conn, $sql);

    if (! empty($result)) {
        $affectedRow ++;
    } else {
        $error_message = mysqli_error($conn) . "\n";
    }
}
?>

<main class="container">
    <h2>XMLinho</h2>
    <h3>Recebendo arquivos...</h3>


<?php
if ($affectedRow > 0) {
    $message = $affectedRow . " records inserted";
} else {
    $message = "No records inserted";
}
?>

<div class="affected-row">
    <?php echo $message; ?>
</div>

<?php if (! empty($error_message)) { ?>
    <div class="error-message">
        <?php echo nl2br($error_message); ?>
    </div>
<?php } ?>

</main>
</body>
</html>