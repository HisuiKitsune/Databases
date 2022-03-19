<?php

require_once('./vendas_crud.php');

if($_POST['txtvalor_ven'] == NULL || $_POST['txtqnt_venda'] == NULL || $_POST['txtid_pv_produto'] == NULL || $_POST['txtid_cli'] == NULL)
{
    header('location: ../view/404.html?status=access-deny');
    exit;
}

$vendas = new stdClass();
    $vendas->id_venda = $_POST['txtid_venda'];
    $vendas->valor_venda = $_POST['txtvalor_ven'];
    $vendas->qnt_venda = $_POST['txtqnt_venda'];
    $vendas->id_pv_produto = $_POST['txtid_pv_produto'];
    $vendas->id_cli = $_POST['txtid_cli'];

$result = updateVendas($vendas);

if($result){
    header("location: ../view/form_vendas_list.php?status=success");
    exit;
} else {
    header("location: ../view/form_vendas_edit.php?id_venda={$vendas->id_venda}&status=fail");
    exit;
}