<?php

        require_once 'conexao_loja.php';

function deleteAll()
{
    try{
            $con = connect();

            $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

            $query = "DELETE FROM endereco;";
            $query .= "DELETE FROM produto_venda;";
            $query .= "DELETE FROM vendas;";
            $query .= "DELETE FROM cliente;";

            $stmt = $con->prepare($query);

            if ($stmt->execute())
            return true;
        } catch (PDOException $error) {
            return false;
        } finally {
            unset($con);
            unset($stmt);
    }
}

if (deleteAll()) {
   header('location: ../view/index.php?status=sucess');
    die();
}
   header('location: ../view/index.php?status=sucess');
    die();