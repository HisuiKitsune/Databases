<?php
require_once('cliente_crud.php');
if (
    $_POST['txtcpf'] == NULL ||
    $_POST['txtnome_cli'] == NULL ||
    $_POST['txtcep'] == NULL ||
    $_POST['txtlgr'] == NULL ||
    $_POST['txtid_bairro'] == NULL 
) {
    header('location: ../view/404.html?status=access-deny'); 
    die(); 
}
$cliente = new stdClass();
    $cliente->cpf = $_POST['txtcpf'];
    $cliente->nome_cli = $_POST['txtnome_cli'];
    $cliente->cep = $_POST['txtcep'];
    $cliente->lgr = $_POST['txtlgr'];
    $cliente->id_bairro = $_POST['txtid_bairro'];


if (addCliente($cliente)) {
    header("location: ../view/cliente_list.php?status=success");
    exit;
} else{
    header("location: ../view/cliente_list.php?status=fail");
    exit;
}
