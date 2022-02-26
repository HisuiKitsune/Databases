<?php

require_once('./cliente.crud.php');

if ($_GET['cpf'] == NULL) {
    header('location: error.php?status=access-deny');
    die();
}

$result = fnDeleteCliente($_GET['cpf']);

if ($result) {
    header("location: cliente.list.php?status=success");
    die();
}

header("location: cliente.list.php?status=fail");
die();
