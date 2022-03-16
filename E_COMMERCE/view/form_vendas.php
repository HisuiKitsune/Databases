<?php
    require_once ('../php/produto_crud.php');
    require_once ('../php/cliente_crud.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/css/style-form.css">
    <title>Formulário de Produtos</title>
</head>
<body>
    <?php include "../php/Navbar-menu.php" ?>
    <div class="container">
        <fieldset>
            <h1>Registro de Vendas</h1>
                <form action="../php/vendas_register.php" method="POST">
                    <div class="form-group">
                    <label for="valor_venda">Valor Total da Venda</label>
                    <input class="form-control" type="text" id="valor_venda" name="txtvalor_ven" required>
                    </div>   
                    <div class="form-group">
                    <label for="cliente" class="form-label">Cliente</label>
                        <select class="form-control" aria-label="Selecione o Cliente" name="txtid_cli" id="cliente" required>
                        <option selected disabled> Selecione o cliente</option>
                        <?php foreach (listCliente() as $clientes) : ?>
                        <option value="<?= $clientes->ID ?>"><?= $clientes->Nome ?></option>
                        <?php endforeach; ?>
                    </div>
                    </select>
                    <label for="id_pro" class="form-label">ID do Produto</label>
                        <select class="form-control" aria-label="Selecione o Produto" name="txtid_pv_produto" id="cliente" required>
                        <option selected disabled> Selecione um Produto </option>
                        <?php foreach (listProdutos() as $produtos) : ?>
                        <option value="<?= $produtos->id_pro ?>"><?= $produtos->nome_pro ?></option>
                        <?php endforeach; ?>
                    </div>
                    </select>
                    <div class="form-group">
                    <label for="nome">Quantidade do Produto</label>
                    <input class="form-control" type="number" id="qnt_venda" name="txtqnt_venda" required>
                    </div>   
                        <button class="btn btn-dark" type="submit">Cadastrar</button>
                </form>                
        </fieldset>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </body>
    </html> 