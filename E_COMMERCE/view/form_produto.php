
<?php
    require_once ('../php/produto_crud.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro de Produtos</title>
    <meta charset="utf-8"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/css/estilo.css">
</head>
<body>
    <?php include "../php/navbar.php" ?>
    <div class="container col-6">
    <fieldset>
    <form action="../php/produto_register.php" method="post"> 
        <div class="form-group mb-3">
            <label for="nomePro">Nome do Produto</label>
            <input type="text" id="nomePro" name="txtnome_pro" placeholder="Ex: Lucky Seven Shape" required>
        </div>
        <div class="form-group mb-3">
            <label for="valor">Valor(R$)</label>
            <input type="text" id="valor" name="txtvalor_pro" placeholder="Ex: 100">
        </div>
        <div class="form-group mb-3">
            <label for="qtd">Quantidades</label>
            <input type="text" id="qtd" name="txtqtd_pro" placeholder="Ex: 1" required>
        </div>  
        <div class="form-group mb-3">
            <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Selecione uma Categoria" name="txtid_categoria" id="categoria" required>
                        <option selected disabled> Selecione uma categoria </option>
                    <?php foreach (listCategoria() as $categoria) : ?>
                <option value="<?= $categoria->id_categoria ?>"><?= $categoria->nome_cat ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <button class="btn btn-dark" type="submit">Cadastrar</button>
    </form>
</fieldset>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>