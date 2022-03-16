<?php

require_once ('conexao_loja.php');

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
            return true;
    } catch (PDOException $error) {
            return false;
    } finally {
        unset($con);
        unset($stmt);
    }
}

function listCategoria()
{
    try {
        $con = connect();

        $rs = $con->query("SELECT * FROM categoria");

        $categorias = array();

        while ($categoria = $rs->fetch(PDO::FETCH_OBJ)) {
            array_push($categorias, $categoria);

        }
        return $categorias;
    } catch (PDOException $error) {
        echo "Erro ao listar as categorias. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($rs);
    }
}

function listProdutos()
{
    try {
        $con = connect();

        $rs = $con->query("SELECT * FROM produtos");

        $produtos = array();

        while ($produto = $rs->fetch(PDO::FETCH_OBJ)) {
            array_push($produtos, $produto);

        }
        return $produtos;
    } catch (PDOException $error) {
        echo "Erro ao listar os Produtos. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($rs);
    }
}