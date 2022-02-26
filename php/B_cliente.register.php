<?php

require_once('./cliente.crud.php');

if (
    $_POST['txtCPF'] == NULL ||
    $_POST['txtNome'] == NULL ||
    $_POST['txtNumero'] == NULL ||
    $_POST['txtCEP'] == NULL ||
    $_POST['txtBairro'] == NULL ||
    $_POST['txtLogradouro'] == NULL ||
    $_POST['txtCodeRegiao'] == NULL ||
    $_POST['txtIdCidade'] == NULL
) {
    header('location: error.php?status=access-deny');
    die();
}

$result = fnAddCliente(
    $_POST['txtCPF'],
    $_POST['txtNome'],
    $_POST['txtNumero'],
    $_POST['txtCEP'],
    $_POST['txtBairro'],
    $_POST['txtLogradouro'],
    $_POST['txtCodeRegiao'],
    $_POST['txtIdCidade'] 
);

if ($result) {
    header("location: cliente.form.php?codigo={$_POST['txtCodeCliente']}&status=success");
    die();
}

header("location: cliente.form.php?codigo={$_POST['txtCodeCliente']}&status=fail");
die();
