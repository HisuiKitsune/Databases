<?php

require_once('./cliente_crud.php');

if ($_GET['id_cli'] == NULL) {
    header('location: ../view/404.html?status=access-deny');
    exit;
}

$result = delete($_GET['id_cli']);

if ($result) {
    header("location: ../view/cliente_list.php?status=success");
    die();
}

header("location: ../view/cliente_list.php?status=fail");
die();