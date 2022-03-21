<?php
    require_once ('../php/endereco_crud.php');
    require_once ('../php/cliente_crud.php');
    $cliente = findByID($_GET["id_cli"]);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/css/style-form.css">
    <title>Formulário de Clientes</title>
</head>
<body>
    <?php include "../php/Navbar-menu.php" ?>
    <div class="container">
        <fieldset>
            <h1>Registro de Clientes</h1>
                <form action="../php/cliente_edit.php" method="POST">
                    <div class="form-group">
                    <label for="nome">Nome do Cliente</label>
                    <input class="form-control" value="<?= $cliente->Nome?>" type="text" id="nome_cliente" name="txtnome_cli" required>
                    </div>   
                    <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input class="form-control" value="<?= $cliente->CPF?>" type="text" id="cpf" name="txtcpf" required">
                    </div>  
                    <div class="form-group">
                    <label for="cep">CEP</label>
                    <input class="form-control" value="<?= $cliente->CEP?>" type="text" id="cep" name="txtcep" required>
                    </div>
                    <div class="form-group">
                    <label for="lgr">Logradouro</label>
                    <input class="form-control" value="<?= $cliente->Logradouro?>" type="number" id="lgr" name="txtlgr" required>
                    </div>
                    <div class="form-group">
                    <label for="bairro" class="form-label">Bairro</label>
                        <select class="form-control" aria-label="Selecione um Bairro" name="txtid_bairro" id="bairro" required>
                        <option value="<?= $cliente->Bairro?>"><?= $cliente->Bairro?></option>
                        <?php foreach (listBairros() as $bairros) : ?>
                        <option value="<?= $bairros->id_bairro ?>"><?= $bairros->nome_bairro ?></option>
                        <?php endforeach; ?>
                    </div>
                    </select>
                        <button class="btn btn-dark" value="<?= $cliente->id_cli ?>" name="txtid_cli" type="submit">Editar</button>
                </form>                
        </fieldset>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </body>
    </html> 