<?php
    require_once ('conexao_loja.php');

function listBairros()
{
    try {
        $con = connect();

        $rs = $con->query("SELECT * FROM bairro");

        $bairros = array();

        while ($bairro = $rs->fetch(PDO::FETCH_OBJ)) {
            array_push($bairros, $bairro);

        }
        return $bairros;
    } catch (PDOException $error) {
        echo "Erro ao listar os bairros. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($rs);
    }
}

//----------------------------------------------------------------