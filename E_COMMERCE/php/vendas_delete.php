<?php

require_once('./vendas_crud.php');

if ($_GET['id_venda'] == NULL) {
    header('location: ../view/404.html?status=access-deny');
    exit;
}

$result = deleteVenda($_GET['id_venda']);

if ($result) {
    header("location: ../view/form_vendas_list.php?status=success");
    die();
}

header("location: ../view/form_vendas_edit.php?{$vendas->id_venda}&status=fail");
die();