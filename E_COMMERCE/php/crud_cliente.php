<?php

require_once 'conexao_loja.php';

function create($aluno)
{
    try {
        $con = getConnection();

        $stmt = $con->prepare("INSERT INTO aluno (nome, email, cpf) VALUES (:nome, :email, :cpf)");

        $stmt->bindParam(":nome", $aluno->nome);
        $stmt->bindParam(":email", $aluno->email);
        $stmt->bindParam(":cpf", $aluno->cpf);

        if ($stmt->execute())
            echo "Aluno(a) cadastrado(a) com sucesso";
    } catch (PDOException $error) {
        echo "Erro no Cadastro. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

//$aluno = new stdClass(); 
//$aluno->nome = "Adilson";
//$aluno->email = "adilson@senac.com.br"; 
//$aluno->cpf = "43429198771";
//create($aluno);*/

function get()
{
    try {
        $con = getConnection();

        $rs = $con->query("SELECT * FROM aluno");

        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            echo $row->id . "<br>";
            echo $row->nome . "<br>";
            echo $row->email . "<br>";
            echo $row->cpf . "<br>---<br>";
        }
    } catch (PDOException $error) {
        echo "Erro ao listar os alunos. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($rs);
    }
}

//get();

function find($nome)
{
    try {
        $con = getConnection();

        $stmt = $con->prepare("SELECT nome, email, cpf FROM aluno WHERE nome LIKE :nome");
        $stmt->bindValue(":nome", "%{$nome}%");

        if($stmt->execute()) {
            if($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo $row->nome. "<br>";
                    echo $row->email . "<br>";
                    echo $row->cpf . "<br>---<br>";
                }
            }
        }
    } catch (PDOException $error) {
        echo "Erro ao buscar o(a) Aluno(a) '{$nome}'. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

//find("Adilson");

function update($aluno)
{
    try {
        $con = getConnection();

        $stmt = $con->prepare("UPDATE aluno SET nome = :nome, email = :email, cpf = :cpf WHERE id = :id");

        $stmt->bindParam(":id", $aluno->id);
        $stmt->bindParam(":nome", $aluno->nome);
        $stmt->bindParam(":email", $aluno->email);
        $stmt->bindParam(":cpf", $aluno->cpf);

        if ($stmt->execute())
            echo "<br>----<br> Dados do(a) Aluno(a) atualizados com sucesso <br>----<br>";
    } catch (PDOException $error) {
        echo "Erro na atualização dos dados. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

//$aluno = new stdClass();
//$aluno->id = 6;
//$aluno->nome = "Tomas";
//$aluno->email = "tom@senac.com.br";
//$aluno->cpf = "98831365797";
//update($aluno);
//find("Tomas");

function delete($id)
{
    try {
        $con = getConnection();

        $stmt = $con->prepare("DELETE FROM aluno WHERE id = ?");
        $stmt->bindParam(1, $id);

        if ($stmt->execute())
            echo "Dados do aluno(a) deletados com sucesso";
    } catch (PDOException $error) {
        echo "Erro ao deletar os dados do(a) aluno(a). Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

//delete(6);
//echo "<br>-----<br>";
//get();

function getView()
{
    try {
        $con = getConnection();

        $rs = $con->query("SELECT * FROM consulta_aluno");

        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            echo $row->CPF . "<br>";
            echo $row->Nome . "<br>";
            echo $row->Email . "<br>---<br>";
        }
    } catch (PDOException $error) {
        echo "Erro ao listar os alunos. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($rs);
    }
}

//getView();
