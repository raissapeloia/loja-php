<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
    <script src="selectsEdeletes.js"></script>
    <link rel="stylesheet" type="text/css" href="identando.css" media="screen" />
</head>

<body>
    <form action="excluirCliente.php" method="POST">
        <label>Cliente </label>
        <select id="cliente" name="idCliente" required>
            <?php

            include('conexaoMySql.php');

            $sql = "SELECT * FROM Clientes";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row["id"] . '">' . $row["nome"] . '</option>';
                }
            } else {
                echo "<option value=''>Não possui cliente cadastrado</option>";
            }
            ?>
        </select>
        </p>
        <button onclick="excluirCliente()">Excluir</button>
    </form>
</body>

</html>

<script>
    function excluirCliente() {
        if (document.getElementById('cliente')?.value > 0) {
            window.location.href = `excluirCliente.php?idCliente=${document.getElementById('cliente').value}`;
        }
    }
</script>