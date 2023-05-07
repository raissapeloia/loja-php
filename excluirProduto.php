<?php

    include('conexaoMySql.php');

    $idProduto = $_POST['codProduto'];
    $x = "DELETE FROM Clientes WHERE id = $idProduto";

    if (mysqli_query($conn,$x)) {
        echo "Produto excluído com sucesso!";
    } else {
        echo "Erro ao excluir produto: " . mysqli_error($conn);
    }

?>