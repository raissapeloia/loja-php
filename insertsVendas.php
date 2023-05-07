<?php

include('conexaoMySql.php');

$valorTotal = 0;

  

    for ($i = 1; $i <= $quantProduto; $i++) {
        $valorTotal += $precoUnitario;
    }


    $x = $mysqli->prepare("INSERT INTO Vendas (idCliente, valorTotal) 
    VALUES (?, ?)");
    $x->bind_param("id", $idCliente, $valorTotal);
    $inserts = $x->execute();

    $select = ("SELECT codigo
    FROM Vendas
    ORDER BY codigo DESC
    LIMIT 1");

    // for ($i = 0; $i <)
    $x = $mysqli->prepare("INSERT INTO ItensVendas (codVendas, codProduto, quantProduto, valorFinal)
    VALUES (?, ?, ?, ?)");
    $x->bind_param("iiid", $codVendas, $codProduto, $quantProduto, $valorFinal);
    $inserts = $x->execute();

    if ($inserts) {
        echo "Venda cadastrada com sucesso!!";
    } else {
        echo "Não foi possível cadastrar esta venda!" . $mysqli->error;
    }

    $stmt->close();
    // $x->close();
    $mysqli->close();


// como vou saber o id do cliente ou id da venda?