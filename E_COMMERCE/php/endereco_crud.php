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


function updateEndereco($endereco)
{
    try {
        $con = connect();

        $stmt = $con->prepare("UPDATE endereco set cep = :cep, lgr = :lgr WHERE id_cli = :last_insert_id();");
        
        $stmt->bindParam(":cep", $endereco->cep);
        $stmt->bindParam(":lgr", $endereco->lgr);
        $stmt->bindParam(":id_bairro", $endereco->id_bairro);

        if ($stmt->execute())
            return true;    
    } catch (PDOException $error) {
        return false;
    } finally {
        unset($con);
        unset($stmt);
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
