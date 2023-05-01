<?php

include('conexaoMySql.php');

$sql = "CREATE TABLE IF NOT EXISTS Clientes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    estado VARCHAR(2) NOT NULL DEFAULT 'SP',
    cidade VARCHAR(20) NOT NULL DEFAULT 'Araraquara',
    bairro VARCHAR(20) NOT NULL,
    rua VARCHAR(40) NOT NULL,
    numeroCasa VARCHAR(7) NOT NULL,
    telefone VARCHAR(14) NOT NULL,
    email VARCHAR(50) NOT NULL)";

// query no MySQL é usada para enviar uma consulta (query) para o banco de dados.
if ($mysqli->query($sql)) {
} else {
    echo "Erro ao criar tabela: " . $mysqli->error;
}


// FAZENDO INSERTS

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

    $stmt = $mysqli->prepare("INSERT INTO Clientes (nome, cpf, cidade, estado, bairro, rua, numeroCasa, telefone, email) 
    VALUES ('$nome', '$cpf', '$cidade','$estado', '$bairro', '$rua', '$numeroCasa', '$telefone', '$email')");
    $stmt->bind_param("sssssssss", $nome, $cpf, $cidade, $estado, $bairro, $rua, $numeroCasa, $telefone, $email);
    $inserts = $stmt->execute();

    if ($inserts) {
        echo "Cadastro realizado com sucesso!!";
    } else {
        echo "Não foi possível cadastrar este cliente!" . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>