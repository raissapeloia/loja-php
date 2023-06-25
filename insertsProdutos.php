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
        echo "<script>alert('Produto cadastrado com sucesso!');location.href=\"cadastroProdutos.html\";</script>";
    } else {
        $textoAlerta = "Não foi possível cadastrar este produto!" . $mysqli->error;
        echo  "<script>alert(". $textoAlerta .");location.href=\"cadastroProdutos.html\";</script>";
    }

    $x->close();
    $mysqli->close();
}