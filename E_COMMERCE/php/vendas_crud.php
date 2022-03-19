<?php

require_once 'conexao_loja.php';

//----------------------------------------------------------------

function addVendas($vendas)
{
    try {
        $con = connect();
        
        $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

        $query = "INSERT INTO vendas(valor_ven, id_cli) VALUES (:valor_ven, :id_cli);";
        $query .= "INSERT INTO produto_venda(id_pv_venda, id_pv_produto, qnt_venda) VALUES (last_insert_id(), :id_pv_produto, :qnt_venda);";

        $stmt = $con->prepare($query);

        $stmt->bindParam(":valor_ven", $vendas->valor_ven);
        $stmt->bindParam(":id_cli", $vendas->id_cli);
        $stmt->bindParam(":id_pv_produto", $vendas->id_pv_produto);
        $stmt->bindParam(":qnt_venda", $vendas->qnt_venda);


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

function listVendas()
{
    try {
        $con = connect();

        $rs = $con->query("SELECT * FROM info_venda");

        $vendas = array();

        while ($venda = $rs->fetch(PDO::FETCH_OBJ)) {
            array_push($vendas, $venda);

        }
        return $vendas;
    } catch (PDOException $error) {
        echo "Erro ao listar os Clientes. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($rs);
    }
}

//----------------------------------------------------------------


function deleteVenda($id_venda)
{
    try {
        $con = connect();
        
        $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

        $query = "DELETE FROM vendas WHERE id_venda = ?;";
        $query .= "DELETE FROM produto_venda WHERE id_pv_venda = id_venda;";

        $stmt = $con->prepare($query);

        $stmt->bindParam(1, $id_venda);

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


function updateVendas($vendas)
{
    try {
        $con = connect();

        $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

        $query = "UPDATE vendas SET id_cli = :id_cli, valor_ven = :valor_ven WHERE id_venda = :id_venda;";
        $query .= "UPDATE produto_venda SET id_pv_produto = :id_pv_produto, qnt_venda = :qnt_venda WHERE id_pv_venda = :id_pv_venda;";

        $stmt = $con->prepare($query);

        $stmt->bindParam(":id_venda", $vendas->id_venda);
        $stmt->bindParam(":id_pv_venda", $vendas->id_venda);
        $stmt->bindParam(":valor_ven", $vendas->valor_venda);
        $stmt->bindParam(":qnt_venda", $vendas->qnt_venda);
        $stmt->bindParam(":id_pv_produto", $vendas->id_pv_produto);
        $stmt->bindParam(":id_cli", $vendas->id_cli);

 
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

function findByIDv($id_venda)
{
    try {
        $con = connect();

        $stmt = $con->prepare("SELECT * FROM info_venda WHERE id_venda LIKE :id_venda");
        $stmt->bindParam(":id_venda", $id_venda);

        if($stmt->execute()) {
            if($stmt->rowCount() > 0) {
                
                return $stmt->fetch(PDO::FETCH_OBJ);

            }
        }
    } catch (PDOException $error) {
        echo "Erro ao buscar o histórico da venda pelo código: '{$id_venda}'. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
