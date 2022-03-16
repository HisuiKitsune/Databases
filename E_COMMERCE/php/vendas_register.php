<?php
require_once('vendas_crud.php');

if (
    $_POST['txtvalor_ven'] == NULL ||
    $_POST['txtid_cli'] == NULL ||
    $_POST['txtid_pv_produto'] == NULL ||
    $_POST['txtqnt_venda'] == NULL 
) {
    header('location: error.php?status=access-deny'); 
    die(); 
}
$vendas = new stdClass();
    $vendas->valor_ven = $_POST['txtvalor_ven'];
    $vendas->id_cli = $_POST['txtid_cli'];

$pv = new stdClass();
    $pv->id_pv_produto = $_POST['txtid_pv_produto'];
    $pv->qnt_venda = $_POST['txtqnt_venda'];


if (addVendas($vendas, $pv)) {
    header("location: vendas_list.php?status=success");
    exit;
} else{
    header("location: vendas_list.php?status=fail");
    exit;
}