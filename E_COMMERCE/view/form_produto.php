<!DOCTYPE html>
<html lang="pt-br">
<head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/css/style_form_product.css">
    <title>Formulário de Produtos</title>
</head>
<body>
<?php include_once("../php/Navbar-menu.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Formulário de Produtos</h1>
                <form action="produto_register.php" method="POST">
                    <div class="form-group">
                    <label for="nome">Nome do Produto:</label>
                    <input type="text" class="form-control" name="nome" required>
                    </div>   
                    <div class="form-group">
                    <label for="valor">Valor(R$):</label>
                    <input type="text" class="form-control" name="valor">
                    </div>  
                    <div class="form-group">
                    <label for="unidades">Unidades:</label>
                    <input type="text" class="form-control" name="unidades">
                    </div>             
                    <div class="formularioCatg">
                        <label for="Categoria">Categoria:</label>
            <input class="form-control" value="<?= $produto->categoria ?>" type="text" name="txtcategoria" id="Categoria" required>
                    </div>         
                    <div class="form-group">                    
                        <button class="btn btn-info" type="submit">Cadastrar</button>
                    </div>  
                </form>                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </body>
    </html>