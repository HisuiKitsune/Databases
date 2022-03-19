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

function findByIDe($id_endereco)
{
    try {
        $con = connect();

        $stmt = $con->prepare("SELECT * FROM endereco WHERE id_endereco LIKE :id_endereco");
        $stmt->bindParam(":id_endereco", $id_endereco);

        if($stmt->execute()) {
            if($stmt->rowCount() > 0) {
                
                return $stmt->fetch(PDO::FETCH_OBJ);

            }
        }
    } catch (PDOException $error) {
        echo "Erro ao buscar o endereço pelo código: '{$id_endereco}'. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
