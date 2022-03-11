<?php

require_once 'conexao_loja.php';

//----------------------------------------------------------------

function addCliente()
{
    try {
        $con = connect();

        $stmt = $con->prepare("INSERT INTO cliente(cpf, nome_cli) VALUES (:cpf, :nome_cli);");

        $stmt->bindValue(":cpf", "17109786785");
        $stmt->bindValue(":nome_cli", "John Doe");

        $stmt->execute();
        unset($stmt);

        $stmt = $con->prepare("INSERT INTO endereco(cep, lgr, id_cli, id_bairro) VALUES (:cep, :lgr, last_insert_id(), :id_bairro);");

        $stmt->bindValue(":cep", 21360510);
        $stmt->bindValue(":lgr", 52);
        $stmt->bindValue(":id_bairro", 3);

        if ($stmt->execute())
            echo "Cliente cadastrado com sucesso";
    } catch (PDOException $error) {
        echo "Erro no Cadastro. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

//addCliente();
//----------------------------------------------------------------


function listCliente()
{
    try {
        $con = connect();

        $rs = $con->query("SELECT * FROM cliente_data");

        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            echo $row->CPF . "<br>";
            echo $row->Nome . "<br>";
            echo $row->Bairro . "<br>";
            echo $row->Região . "<br>";
            echo $row->Logradouro . "<br>";
            echo $row->CEP . "<br>---<br>";
        }
    } catch (PDOException $error) {
        echo "Erro ao listar os Clientes. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($rs);
    }
}
//listCliente();
//----------------------------------------------------------------


function find($nome)
{
    try {
        $con = connect();

        $stmt = $con->prepare("SELECT * FROM cliente_data WHERE nome LIKE :nome");
        $stmt->bindValue(":nome", "%{$nome}%");

        if($stmt->execute()) {
            if($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo $row->CPF . "<br>";
                    echo $row->Nome . "<br>";
                    echo $row->Bairro . "<br>";
                    echo $row->Região . "<br>";
                    echo $row->Logradouro . "<br>";
                    echo $row->CEP . "<br>---<br>";
                }
            }
        }
    } catch (PDOException $error) {
        echo "Erro ao buscar o Cliente '{$nome}'. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

//find("John Doe");
//----------------------------------------------------------------


function updateCliente()
{
    try {
        $con = connect();

        $stmt = $con->prepare("UPDATE cliente SET nome_cli = :nome_cli, cpf = :cpf WHERE id_cli = :id_cli");

        $stmt->bindValue(":id_cli", 9);
        $stmt->bindValue(":nome_cli", "Jhon");
        $stmt->bindValue(":cpf", "17109786788");

        $stmt->execute();
        unset($stmt);

        $stmt = $con->prepare("UPDATE endereco set cep = :cep, lgr = :lgr WHERE id_cli = last_insert_id()");

        $stmt->bindValue(":cep", 21360120);
        $stmt->bindValue(":lgr", 120);

        if ($stmt->execute())
            echo "<br>----<br> Dados do Cliente atualizados com sucesso <br>----<br>";
    } catch (PDOException $error) {
        echo "Erro na atualização dos dados. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

//updateCliente();
//----------------------------------------------------------------


function delete($id)
{
    try {
        $con = connect();

        $stmt = $con->prepare("DELETE FROM cliente WHERE id_cli = ?");
        $stmt->bindParam(1, $id);

        if ($stmt->execute())
            echo "Dados do Cliente deletados com sucesso";
    } catch (PDOException $error) {
        echo "Erro ao deletar os dados do Cliente. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

//delete(4);
//----------------------------------------------------------------
