<?php

require_once 'conexao_loja.php';

function addVendas($vendas, $pv)
{
    try {
        $con = connect();

        $stmt = $con->prepare("INSERT INTO vendas(valor_ven, id_cli) VALUES (:valor_ven, :id_cli);");

        $stmt->bindParam(":valor_ven", $vendas->valor_ven);
        $stmt->bindParam(":id_cli", $vendas->id_cli);

        $stmt->execute();
        unset($stmt);

        $stmt = $con->prepare("INSERT INTO produto_venda(id_pv_venda, id_pv_produto, qnt_venda) VALUES (last_insert_id(), :id_pv_produto, :qnt_venda);");

        $stmt->bindParam(":id_pv_produto", $pv->id_pv_produto);
        $stmt->bindParam(":qnt_venda", $pv->qnt_venda);


        if ($stmt->execute())
            return true;
    } catch (PDOException $error) {
            return false;
    } finally {
        unset($con);
        unset($stmt);
    }
}
