<?php

require_once 'conexao_loja.php';

//----------------------------------------------------------------

function addCliente($cliente)
{
    try {
        $con = connect();

        $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

        $query = "INSERT INTO cliente(cpf, nome_cli) VALUES (:cpf, :nome_cli);";
        $query .= "INSERT INTO endereco(cep, lgr, id_cli, id_bairro) VALUES (:cep, :lgr, last_insert_id(), :id_bairro);";

        $stmt = $con->prepare($query);

        $stmt->bindParam(":cpf", $cliente->cpf);
        $stmt->bindParam(":nome_cli", $cliente->nome_cli);
        $stmt->bindParam(":cep", $cliente->cep);
        $stmt->bindParam(":lgr", $cliente->lgr);
        $stmt->bindParam(":id_bairro", $cliente->id_bairro);

        if ($stmt->execute())
            echo "Cliente cadastrado com sucesso";
    } catch (PDOException $error) {
        echo "Erro no Cadastro. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}


//----------------------------------------------------------------


function listCliente()
{
    try {
        $con = connect();

        $rs = $con->query("SELECT * FROM cliente_data");

        $clientes = array();

        while ($cliente = $rs->fetch(PDO::FETCH_OBJ)) {
            array_push($clientes, $cliente);

        }
        return $clientes;
    } catch (PDOException $error) {
        echo "Erro ao listar os Clientes. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($rs);
    }
}


//----------------------------------------------------------------


function find($nome)
{
    try {
        $con = connect();

        $stmt = $con->prepare("SELECT * FROM cliente_data WHERE nome LIKE :nome");
        $stmt->bindValue(":nome", "%{$nome}%");

        if($stmt->execute()) {
            if($stmt->rowCount() > 0) {

                $clientes = array();
                while($cliente = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($clientes, $cliente);

                }
            }return $cidades;
        }
    } catch (PDOException $error) {
        echo "Erro ao buscar o Cliente '{$nome}'. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}


function findByID($id_cli)
{
    try {
        $con = connect();

        $stmt = $con->prepare("SELECT * FROM cliente_data WHERE id_cli LIKE :id_cli");
        $stmt->bindParam(":id_cli", $id_cli);

        if($stmt->execute()) {
            if($stmt->rowCount() > 0) {
                
                return $stmt->fetch(PDO::FETCH_OBJ);

            }
        }
    } catch (PDOException $error) {
        echo "Erro ao buscar o Cliente pelo código: '{$id_cli}'. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

//----------------------------------------------------------------


function updateCliente($cliente)
{
    try {
        $con = connect();

        $stmt = $con->prepare("UPDATE cliente SET nome_cli = :nome_cli, cpf = :cpf WHERE id_cli = :id_cli;");

        $stmt->bindParam(":id_cli", $cliente->id_cli);
        $stmt->bindParam(":cpf", $cliente->cpf);
        $stmt->bindParam(":nome_cli", $cliente->nome_cli);

        $stmt->execute();
        unset($stmt);

        $stmt = $con->prepare("UPDATE endereco set cep = :cep, lgr = :lgr, id_bairro = :id_bairro WHERE id_cli = :id_cli;");
        
        $stmt->bindParam(":cep", $cliente->cep);
        $stmt->bindParam(":lgr", $cliente->lgr);
        $stmt->bindParam(":id_bairro", $cliente->id_bairro);

 
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


function delete($id_cli)
{
    try {
        $con = connect();

        $stmt = $con->prepare("DELETE FROM cliente WHERE id_cli = ?");
        $stmt->bindParam(1, $id_cli);

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
