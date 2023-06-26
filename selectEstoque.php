<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="identando.css" media="screen" />
</head>
<body>
</body>
</html>



<?php

include('conexaoMySql.php');

$sql = "SELECT * FROM Produtos";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Nome : " . $row["nome"] . "</p>";
        echo "Código identificador : " . $row["codigo"] . "</p>";
        echo "Valor : " . $row["preco"] . "</p>";
        echo "Quantidade em estoque : " . $row["quantEstoque"] . "</p>";
        echo "----------------------------------------- </p>";
    }
} else {
    echo "0 results";
}
