<?php

include "config/config.php";
include "config/DLL.php";
if (!isset($_SESSION)) session_start();
teste_login($_SESSION['sess_aut'], $local);

if (isset($_REQUEST['BSair'])){
    $_SESSION = array();
    $local = $local."login/login.html";
    header($local);
    exit;
}

if (isset($_REQUEST['save'])) {
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->load("model.xml");

    $rootTag = $xml->getElementsByTagName("items")->item(0);
    $dataTag = $xml->createElement("item");

    $tamanhoCasaTag = $xml->createElement("tamanhoCasa", $_REQUEST['tamanhoCasa']);
    $valorVendaTag = $xml->createElement("valorVenda", $_REQUEST['valorVenda']);
    $sinalTotalTag = $xml->createElement("sinalTotal", $_REQUEST['sinalTotal']);
    $numeroPrestacoesTag = $xml->createElement("numeroPrestacoes", $_REQUEST['numeroPrestacoes']);
    $valorPrestacoesTag = $xml->createElement("valorPrestacoes", $_REQUEST['valorPrestacoes']);

    $dataTag->appendChild($tamanhoCasaTag);
    $dataTag->appendChild($valorVendaTag);
    $dataTag->appendChild($sinalTotalTag);
    $dataTag->appendChild($numeroPrestacoesTag);
    $dataTag->appendChild($valorPrestacoesTag);
    $rootTag->appendChild($dataTag);
    $xml->save("XMLinho.xml");
}

// Servidor FTP
$servidor_ftp = 'ftpupload.net';
$usuario_ftp = 'epiz_32675397';
$senha_ftp   = 'testexmlinho';
$caminho = 'htdocs/processaXML/gaveta/';

$file = 'XMLinho.xml';
$arquivo = $file;
$nome_arquivo = 'XMLinho.xml';
$arquivo_temp = 'XMLinho.xml';
$destino = $caminho . $nome_arquivo;
$conexao_ftp = ftp_connect($servidor_ftp);
$login_ftp = ftp_login($conexao_ftp, $usuario_ftp, $senha_ftp);
if (ftp_put($conexao_ftp, $destino, $arquivo_temp, FTP_BINARY)) {
    // Se for enviado, mostra essa mensagem
    unlink($file);
    $local = $local."index.php";
    header($local);
    exit;
} else {
    echo 'Erro ao enviar arquivo!';
}

// Fecha a conexão FTP
ftp_close($conexao_ftp);