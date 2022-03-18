<?php
    
    require_once('../php/cliente_crud.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Listagem de Clientes</title>
</head>

<body>
    <?php include "../php/Navbar-menu.php" ?>
    <div class="container">
        <table class="table table-stripped mt-5">
            <thead>
                <th>#</th>
                <th>CPF</th>
                <th>Nome</th>
                <th>Bairro</th>
                <th>Região</th>
                <th>Logradouro</th>
                <th>CEP</th>
            </thead>
            <tbody>
                <?php foreach (listCliente() as $cliente) : ?>
                    <tr>
                        <td><?= $cliente->id_cli ?></td>
                        <td><?= $cliente->CPF ?></td>
                        <td><?= $cliente->Nome ?></td>
                        <td><?= $cliente->Bairro ?></td>
                        <td><?= $cliente->Região ?></td>
                        <td><?= $cliente->Logradouro ?></td>
                        <td><?= $cliente->CEP ?></td>
                        <td>
                            <a href="form_cliente_edit.php?id_cli=<?= $cliente->id_cli ?>"><span style="color: orange;"><i class="fa-solid fa-pen-to-square"></i></span></a>
                            <a href="../php/cliente_delete.php?id_cli=<?= $cliente->id_cli ?>" onclick="return confirm('Deseja realmente remover o cliente: <?= $cliente->Nome ?> ?')"><span style="color: red;"><i class="fa-solid fa-eraser"></i></span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>