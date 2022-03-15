<?php
require_once('produto_crud.php');
if (
    $_POST['txtnome_pro'] == NULL ||
    $_POST['txtvalor_pro'] == NULL ||
    $_POST['txtqtd_pro'] == NULL ||
    $_POST['txtid_categoria'] == NULL 
) {
    header('location: error.php?status=access-deny'); 
    exit; 
}
$produto = new stdClass();
    $produto->nome_pro = $_POST['txtnome_pro'];
    $produto->valor_pro = $_POST['txtvalor_pro'];
    $produto->qtd_pro = $_POST['txtqtd_pro'];
    $produto->id_categoria = $_POST['txtid_categoria'];



if (addProduto($produto)) {
    header("location: produto_list.php?status=success");
    exit;
} else{
    header("location: produto_list.php?status=fail");
    exit;
}
