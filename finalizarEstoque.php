<?php
if (!isset($_SESSION)) {
    session_start();
}

include('conexaoMySql.php');
include("Produtos.class.php");

try {
    $produto = $_GET["produto"];
    $qtdeEstoque = $_GET["qtdeEstoque"];

    $mysqli->begin_transaction();
    $sql = 'SELECT preco FROM produtos WHERE codigo = ' . $produto . '';
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        $x = $mysqli->prepare("UPDATE produtos SET quantEstoque=(quantEstoque + ?) WHERE codigo=?;");
        $x->bind_param("di", $qtdeEstoque, $produto);
        $updates = $x->execute();
    }

    if ($updates) {
        echo "<script>alert('Estoque adicionado com sucesso!');location.href=\"estoque.php\";</script>";
    } else {
        echo  "<script>alert('Não foi possivel adicionar ao estoque!');location.href=\"estoque.php\";</script>";
    }

    $mysqli->commit();
    $mysqli->close();
} catch (mysqli_sql_exception $exception) {
    $mysqli->rollback();
    throw $exception;
}
