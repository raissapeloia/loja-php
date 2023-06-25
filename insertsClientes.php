<?php

include('conexaoMySql.php');

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numeroCasa = $_POST['numeroCasa'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $x = $mysqli->prepare("INSERT INTO Clientes (nome, cpf, cidade, estado, bairro, rua, numeroCasa, telefone, email) 
    VALUES (?,?,?,?,?,?,?,?,?)");
    $x->bind_param("sssssssss", $nome, $cpf, $cidade, $estado, $bairro, $rua, $numeroCasa, $telefone, $email);
    $inserts = $x->execute();

    if ($inserts) {
        echo "<script>alert('Cadastro realizado com sucesso!');location.href=\"cadastroCliente.html\";</script>";
    } else {
        $textoAlerta = "Não foi possível cadastrar este cliente!" . $mysqli->error;
        echo  "<script>alert(". $textoAlerta .");location.href=\"cadastroCliente.html\";</script>";
    }

    $x->close();
    $mysqli->close();
}
?>