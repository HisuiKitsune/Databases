<?php

require_once('./cliente_crud.php');

if ($_GET['id_cli'] == NULL) {
    header('location: ../view/404.html?status=access-deny');
    exit;
}

$result = delete($_GET['id_cli']);

if ($result) {
    header("location: ../view/form_cliente_list.php?delete=success");
    die();
}

header("location: ../view/form_cliente_list.php?delete=fail");
die();