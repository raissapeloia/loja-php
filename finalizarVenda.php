<?php
if (!isset($_SESSION)) {
    session_start();
}

include('conexaoMySql.php');
include("Produtos.class.php");

try {
    $produtos = unserialize($_SESSION['produtos']);
    $idCliente = $_GET["idCliente"];

    $valorTotal = 0;

    for ($i = 0; $i < count($produtos); $i++) {
        $produto = $produtos[$i];
        $sql = 'SELECT preco FROM produtos WHERE codigo = ' . $produto->getCodigo() . '';
        $result = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($result) > 0) {
            if ($row = mysqli_fetch_assoc($result)) {
                $produto->setPreco($row["preco"]);
            }
        } else {
            $produto->setPreco(0);
        }
        $valorTotal += $produto->getPreco() * $produto->getQuantidade();
    }

    $mysqli->begin_transaction();
    $x = $mysqli->prepare("INSERT INTO Vendas (idCliente, valorTotal) 
    VALUES (?, ?)");
    $x->bind_param("id", $idCliente, $valorTotal);
    $inserts = $x->execute();

    $sql = 'SELECT codigo FROM vendas order by codigo desc limit 1';
    $result = mysqli_query($mysqli, $sql);
    $codVendas = 0;
    if (mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_assoc($result)) {
            $codVendas = $row["codigo"];
        }
    }

    for ($i = 0; $i < count($produtos); $i++) {
        $produto = $produtos[$i];
        $x = $mysqli->prepare("INSERT INTO ItensVendas (codVendas, codProduto, quantProduto, valorTotal)
    VALUES (?, ?, ?, ?)");
        $totalProduto = $produto->getPreco() * $produto->getQuantidade();
        $codProduto = $produto->getCodigo();
        $quantidadeProduto = $produto->getQuantidade();
        $x->bind_param("iidd", $codVendas, $codProduto, $quantidadeProduto, $totalProduto);
        $inserts = $x->execute();
    }

    if ($inserts) {
        echo "Venda cadastrada com sucesso!!";
    } else {
        echo "Não foi possível cadastrar esta venda!" . $mysqli->error;
    }

    $mysqli->commit();
    $mysqli->close();
} catch (mysqli_sql_exception $exception) {
    $mysqli->rollback();
    throw $exception;
} finally {
    $_SESSION['produtos'] = null;
}
