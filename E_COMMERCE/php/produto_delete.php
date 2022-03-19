<?php

require_once('./produto_crud.php');

if ($_GET['id_pro'] == NULL) {
    header('location: ../view/404.html?status=access-deny');
    exit;
}

$result = deleteProduto($_GET['id_pro']);

if ($result) {
    header("location: ../view/form_produto_list.php?status=success");
    die();
}

header("location: ../view/form_produto_edit.php?{$produto->id_pro}&status=fail");
die();