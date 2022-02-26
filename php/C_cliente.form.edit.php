<?php
require_once('./cidade.crud.php');
require_once('./cliente.crud.php');

if ($_GET['cpf'] != NULL) {
    $cliente = fnFindCliente($_GET['cpf']);
} else {
    header('location: error.php?status=access-deny');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>