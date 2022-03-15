<?php
require_once('cliente_crud.php');
if (
    $_POST['txtcpf'] == NULL ||
    $_POST['txtnome_cli'] == NULL ||
    $_POST['txtcep'] == NULL ||
    $_POST['txtlgr'] == NULL ||
    $_POST['txtid_bairro'] == NULL 
) {
    header('location: error.php?status=access-deny'); 
    die(); 
}
$cliente = new stdClass();
    $cliente->cpf = $_POST['txtcpf'];
    $cliente->nome_cli = $_POST['txtnome_cli'];
$endereco = new stdClass();
    $endereco->cep = $_POST['txtcep'];
    $endereco->lgr = $_POST['txtlgr'];
    $endereco->id_bairro = $_POST['txtid_bairro'];


if (addCliente($cliente, $endereco)) {
    header("location: cliente_list.php?status=success");
    exit;
} else{
    header("location: cliente_list.php?status=fail");
    exit;
}
