<?php

    include('conexaoMySql.php');

    $idCliente = $_POST['idCliente'];
    $x = "DELETE FROM Clientes WHERE id = $idCliente";

    if (mysqli_query($conn,$x)) {
        echo "Cliente excluído com sucesso!";
    } else {
        echo "Erro ao excluir produto: " . mysqli_error($conn);
    }

?>