<?php

include('conexaoMySql.php');

$sql = "CREATE TABLE IF NOT EXISTS Produtos (
    nome VARCHAR(30) NOT NULL,
    cod INT(6) PRIMARY KEY,
    preco DECIMAL(5,3) NOT NULL,
    quantEstoque VARCHAR(2) NOT NULL)";

if ($mysqli->query($sql)) {
} else {
    echo "Erro ao criar tabela: " . $mysqli->error;
}


// FAZENDO INSERTS


if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $cod = $_POST['cod'];
    $preco = $_POST['preco'];
    $quantEstoque = $_POST['quantEstoque'];

    $stmt = $mysqli->prepare("INSERT INTO Produtos (nome, cod, preco, quantEstoque) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siis", $nome, $cod, $preco, $quantEstoque);
    $inserts = $stmt->execute();

    if ($inserts) {
        echo "Produto cadastrado com sucesso!!";
    } else {
        echo "Não foi possível cadastrar este produto!" . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}