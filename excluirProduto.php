<?php

include('conexaoMySql.php');

try {
    $idProduto = $_POST['codProduto'];
    $mysqli->begin_transaction();

    $sql = 'select 1 from vendas left join itensvendas itVendas on itVendas.codVendas = codigo
    where itVendas.codProduto = ' . $idProduto . ' limit 1';
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Não foi possível excluir o produto pois está vinculado a alguma venda!');location.href=\"excluirProdutoTemplate.php\";</script>";
    } else {
        $x = "DELETE FROM produtos WHERE codigo = " . $idProduto;
        if (mysqli_query($mysqli, $x)) {
            echo "<script>alert('Produto excluído com sucesso!');location.href=\"excluirProdutoTemplate.php\";</script>";
        } else {
            $textoAlerta = "Não foi possível excluir o produto!" . $mysqli->error;
            echo  "<script>alert(" . $textoAlerta . ");location.href=\"excluirProdutoTemplate.php\";</script>";
        }
    }
    $mysqli->commit();
    $mysqli->close();
} catch (mysqli_sql_exception $exception) {
    $mysqli->rollback();
    throw $exception;
}
