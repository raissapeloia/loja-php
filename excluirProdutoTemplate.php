<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir produto</title>
    <script src="selectsEdeletes.js"></script>
    <link rel="stylesheet" type="text/css" href="identando.css" media="screen" />
</head>

<body>
    <form action="excluirProduto.php" method="POST">
        <label>Produto </label>
        <select name="codProduto" required>
            <?php

            include('conexaoMySql.php');

            $sql = "SELECT * FROM produtos";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row["codigo"] . '">' . $row["nome"] . '</option>';
                }
            } else {
                echo "<option value=''>Não possui produto cadastrado</option>";
            }
            ?>
        </select>
        </p>
        <button onclick="excluirProduto()">Excluir</button>
    </form>
</body>

</html>

<script>
    function excluirProduto() {
        if (document.getElementById('idProduto')?.value > 0) {
            window.location.href = `excluirProduto.php?idProduto=${document.getElementById('idProduto').value}`;
        }
    }
</script>