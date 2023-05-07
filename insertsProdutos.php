<?php

include('conexaoMySql.php');


if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $cod = $_POST['cod'];
    $preco = $_POST['preco'];
    $quantEstoque = $_POST['quantEstoque'];

    $x = $mysqli->prepare("INSERT INTO Produtos (nome, cod, preco, quantEstoque) 
    VALUES (?, ?, ?, ?)");
    $x->bind_param("siis", $nome, $cod, $preco, $quantEstoque);
    $inserts = $x->execute();

    if ($inserts) {
        echo "Produto cadastrado com sucesso!!";
    } else {
        echo "Não foi possível cadastrar este produto!" . $mysqli->error;
    }

    $x->close();
    $mysqli->close();
}