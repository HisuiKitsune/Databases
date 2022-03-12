<?php
require_once('breno.crud.php');
if (
    $_POST['nome'] == NULL 
    $_POST['Valor'] == NULL 
    $_POST['Unidades'] == NULL 
) {
    header('location: error.php?status=access-deny'); 
    die(); 
}
$result = fnAddProduto(
    $_POST['nome'], 
    $_POST['Valor'],
    $_POST['Unidades'],
);
if ($result) {
    header("location: breno.form.php?codigo={$_POST['txtbreno']}&status=success");
    die();
}
header("location: breno.form.php?codigo={$_POST['txtbreno']}&status=fail");
die();
?>