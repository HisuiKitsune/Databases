<?php
require_once('./conexao.php');


function fnAddCliente($cpf, $nome_cli, $numero, $cep, $bairro, $logradouro, $cod_regiao, $id_cid)
{
    $link = getConnection();

    $query = "insert into cliente(cpf, nome_cli) values ({$cpf}, '{$nome_cli}');"
    $query .= "insert into endereco(cep, bairro, lgr, cod_regiao, cpf)" 
    $query .= "values ({$cep}, '{$bairro}', {$logradouro}, {$cod_regiao}, {$cpf}, {$id_cid});";

    $result = mysqli_multi_query($link, $query);
    mysqli_close($link);

    if ($result) {
        return true;
    }
    return false;
}

function fnListClientes($nome_cli = '')
{
    $link = getConnection();
    $query = "select * from cliente_data where Nome like '%{$nome_cli}%'";

    $result = mysqli_query($link, $query);

    $clientes = array();
    while ($cliente = mysqli_fetch_assoc($result)) {
        array_push($clientes, $cliente);
    }

    mysqli_close($link);
    return $clientes;
}

function fnFindCliente($cpf)
{
    $link = getConnection();
    $query = "select * from cliente_data where CPF = {$cpf}";

    $result = mysqli_query($link, $query);

    mysqli_close($link);
    return mysqli_fetch_assoc($result);
}

function fnUpdateCliente($cpf, $nome_cli, $numero, $cep, $bairro, $logradouro, $cod_regiao, $id_cid)
{
    $link = getConnection();
    $query = "update cliente set nome_cli = '{$nome_cli}' where cpf = {$cpf};";

    $query .= "update endereco set " .
    "cep = {$cep}" .
    "bairro = '{$bairro}'".
    "lgr = {$logradouro}".
    "cod_regiao = {$cod_regiao}" .
    "id_cid = {$id_cid}" .
    "where cpf = {$cpf};";
    $result = mysqli_multi_query($link, $query);

    mysqli_close($link);

    if ($result) {
        return true;
    }

    return false;
}

function fnDeleteCliente($cpf)
{
    $link = getConnection();
    $query = "delete from endereco where cpf = {$cpf};";
    $query .= "delete from cliente where cpf = {$cpf};";

    $result = mysqli_multi_query($link, $query);
    mysqli_close($link);

    if ($result) {
        return true;
    }

    return false;
}