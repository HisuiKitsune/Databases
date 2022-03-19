<?php

require_once('./produto_crud.php');

if (
    $_POST['txtid_pro'] == NULL ||
    $_POST['txtnome_pro'] == NULL ||
    $_POST['txtvalor_pro'] == NULL ||
    $_POST['txtqtd_pro'] == NULL ||
    $_POST['txtid_categoria'] == NULL 
) {
    header('location: ../view/404.html?status=access-deny'); 
    die(); 
}
$produto = new stdClass();
    $produto->id_pro = $_POST['txtid_pro'];
    $produto->nome_pro = $_POST['txtnome_pro'];
    $produto->valor_pro = $_POST['txtvalor_pro'];
    $produto->qtd_pro = $_POST['txtqtd_pro'];
    $produto->id_categoria = $_POST['txtid_categoria'];

$result = updateProduto($produto);

if($result){
    header("location: ../view/form_produto_list.php?status=success");
    exit;
} else {
    header("location: ../view/form_produto_edit.php?id_pro={$produto->id_pro}&status=fail");
    exit;
}
