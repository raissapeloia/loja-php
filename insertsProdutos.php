<?php

include('conexaoMySql.php');


if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantEstoque = $_POST['quantEstoque'];

    $x = $mysqli->prepare("INSERT INTO Produtos (nome, preco, quantEstoque) 
    VALUES (?, ?, ?)");
    $x->bind_param("sds", $nome, $preco, $quantEstoque);
    $inserts = $x->execute();

    if ($inserts) {
        echo "Produto cadastrado com sucesso!!";
    } else {
        echo "Não foi possível cadastrar este produto!" . $mysqli->error;
    }

    $x->close();
    $mysqli->close();
}