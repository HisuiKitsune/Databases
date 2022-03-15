<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro de Produtos</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/estilo.css">
</head>
<body>
    <?php include "../php/navbar.php" ?>
    <div class="container col-6">
    <fieldset>
    <form action="produto_register.php" method="post"> 
        <div class="field">
            <label for="nome">Nome do Produto</label>
            <input type="text" id="nome" name="nome" placeholder="Ex: Lucky Seven Board" required>
        </div>
        <div class="field">
            <label for="telefone">Valor(R$)</label>
            <input type="text" id="Valor" name="Valor" placeholder="Ex: 100">
        </div>
        <div class="field">
            <label for="Unidades">Unidades</label>
            <input type="text" id="Unidades" name="Unidades" placeholder="Ex: 1" required>
        </div>  
        <div class="formularioCatg">
            <label for="Categoria">Categoria</label>
            <input class="form-control" value="<?= $produto->categoria ?>" type="text" name="txtcategoria" id="Categoria" placeholder="Informe a Categoria do Produto" required>
        </div>
            <br><br>
          </form>
        </div>
        <button class="btn btn-dark" type="submit">Cadastrar</button>
    </form>
</fieldset>
</body>
</html>