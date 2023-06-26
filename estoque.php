<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>
    <script src="selectsEdeletes.js"></script>
    <link rel="stylesheet" type="text/css" href="identando.css" media="screen" />
</head>
<body>
    <label>Produto </label>
    <select id="codProduto" required>
        <?php
        include('conexaoMySql.php');
        $sql = "SELECT * FROM produtos";
        $result = mysqli_query($mysqli, $sql);
        // se o resultado for maior que 0 retornara as informações do select.
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row["codigo"] . '">' . $row["nome"] . ' - Estoque: ' . $row['quantEstoque'] . '</option>';
            }
        } else {
            echo "<option value=''>Não possui produto cadastrado</option>";
        }
        ?>
    </select>
    </p>
    <legend>Quantidade que deseja adicionar</legend>
    <input type="text" id="qtdeEstoque">
    </p>
    <button onclick="finalizarEstoque()">Adicionar</button>
    <button onclick="selectEstoque()">Buscar dados no estoque</button>
</body>
</html>

<script>
    // se os valores dos campos existirem, faz as alterações no estoque
    function finalizarEstoque() {
        var produto = document.getElementById('codProduto')?.value;
        var qtdeEstoque = document.getElementById('qtdeEstoque')?.value
        if ( produto > 0 && qtdeEstoque != undefined) {
            window.location.href = `finalizarEstoque.php?qtdeEstoque=${qtdeEstoque}&produto=${produto}`;
        }
        else {
            alert ("Faltam informações");
        }
    }
</script>