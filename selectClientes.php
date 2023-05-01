<?php

include('conexaoMySql.php');

$sql = "SELECT * FROM Clientes";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {
      echo "Código identificador : " . $row["id"] . "</p>";
      echo "Nome : " . $row["nome"] . "</p>";
      echo "CPF : " . $row["cpf"];
      echo "Estado : " . $row["estado"] . "</p>";
      echo "Cidade : " . $row["cidade"] . "</p>";
      echo "Bairro : " . $row["bairro"] . "</p>";
      echo "Rua / Av : " . $row["rua"] . "</p>";
      echo "Número : " . $row["numeroCasa"] . "</p>";
      echo "Telefone : " . $row["telefone"] . "</p>";
      echo "E-mail : " . $row["email"] . "</p>";
      echo "----------------------------------------- </p>";
    }
  } else {
    echo "0 results";
  }
?>