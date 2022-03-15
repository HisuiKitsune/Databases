<?php

require_once './conexao_loja.php';

function addProduto($produto)
{
    try {
        $con = connect();

        $stmt = $con->prepare("INSERT INTO produtos(nome_pro, valor_pro, qtd_pro, id_categoria) VALUES (:nome_pro, :valor_pro, :qtd_pro, :id_categoria);");

        $stmt->bindParam(":nome_pro", $produto->nome_pro);
        $stmt->bindParam(":valor_pro", $produto->valor_pro);
        $stmt->bindParam(":qtd_pro", $produto->qtd_pro);
        $stmt->bindParam(":id_categoria", $produto->id_categoria);

        if ($stmt->execute())
            echo "Produto Cadastrado com Sucesso";
    } catch (PDOException $error) {
        echo "Erro no Cadastro. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
