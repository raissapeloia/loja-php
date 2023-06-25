<?php

    include('conexaoMySql.php');

    try {
        $idCliente = $_POST['idCliente'];
        $mysqli->begin_transaction();
    
        $sql = 'select 1 from vendas where idCliente = ' . $idCliente . ' limit 1';
        $result = mysqli_query($mysqli, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Não foi possível excluir o cliente pois está vinculado a alguma venda!');location.href=\"excluirClienteTemplate.php\";</script>";
        } else {
            $x = "DELETE FROM Clientes WHERE id = $idCliente";
            if (mysqli_query($mysqli, $x)) {
                echo "<script>alert('Cliente excluído com sucesso!');location.href=\"excluirClienteTemplate.php\";</script>";
            } else {
                $textoAlerta = "Não foi possível excluir o cliente!" . $mysqli->error;
                echo  "<script>alert(" . $textoAlerta . ");location.href=\"excluirClienteTemplate.php\";</script>";
            }
        }
        $mysqli->commit();
        $mysqli->close();
    } catch (mysqli_sql_exception $exception) {
        $mysqli->rollback();
        throw $exception;
    }
