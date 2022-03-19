<?php
    
    require_once('../php/vendas_crud.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="./assets/css/list.css">
    <title>Listagem de Vendas</title>
</head>

<body>
    <?php include "../php/Navbar-menu.php" ?>
    <div class="container">
    <table class="table table-borderless table-hover">
            <thead>
                <th>Venda</th>
                <th>Produto</th>
                <th>Valor Total</th>
                <th>Quantidade</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data da Venda</th>
            </thead>
            <tbody>
                <?php foreach (listVendas() as $vendas) : ?>
                    <tr>
                        <td><?= $vendas->id_venda ?></td>
                        <td><?= $vendas->Produto ?></td>
                        <td><?= $vendas->Valor_Venda ?></td>
                        <td><?= $vendas->Quantidade ?></td>
                        <td><?= $vendas->Nome ?></td>
                        <td><?= $vendas->CPF ?></td>
                        <td><?= $vendas->Data_Venda ?></td>
                        <td>
                            <a href="form_vendas_edit.php?id_venda=<?= $vendas->id_venda ?>"><span style="color: #F28123;"><i class="fa-solid fa-pen-to-square"></i></span></a>
                            <a href="../php/vendas_delete.php?id_venda=<?= $vendas->id_venda ?>" onclick="return confirm('Deseja realmente remover o histórico da venda <?= $vendas->id_venda ?> ?')"><span style="color: red;"><i class="fa-solid fa-eraser"></i></span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>