<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançamento de vendas</title>
    <link rel="stylesheet" type="text/css" href="identando.css" media="screen" />
</head>

<body>
    <form method="POST">
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
        <label>Quantidade </label>
        <input type='number' name='quantProduto' required>
        </p>
        <button class='button, alinhando'>Adicionar produto</button>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        include "Produtos.class.php";
        if (!isset($_SESSION['produtos'])) {
            $produtos = array();
        } else {
            $produtos = unserialize($_SESSION['produtos']);
        }
        if (array_key_exists('codProduto', $_POST) && !verificaContemProduto($produtos, $_POST['codProduto'], $_POST['quantProduto'])) {
            array_push($produtos, new Produtos($_POST['codProduto'], $_POST['quantProduto'], $_POST['quantProduto']));
            $_SESSION['produtos'] = serialize($produtos);
        }

        function verificaContemProduto($produtos, $codigo, $quantidade)
        {
            for ($i = 0; $i < count($produtos); $i++) {
                $produto = $produtos[$i];
                if ($produto->getCodigo() == $codigo) {
                    $produto->setQuantidade($produto->getQuantidade() + $quantidade);
                    $_SESSION['produtos'] = serialize($produtos);
                    return true;
                }
            }
            return false;
        }

        if (count($produtos) > 0) {
            echo "</p>";
            echo "<span>Produtos</span>";
            for ($i = 0; $i < count($produtos); $i++) {
                $produto = $produtos[$i];
                echo
                '<div>
                    Código: ' . $produto->getCodigo() . '
                    Quantidade:' . $produto->getQuantidade() . '
                </div>';
            }
        }
        ?>
        </p>
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
        <button class='button, alinhando' type="button" onclick='finalizarVenda()'>Finalizar venda!</button>
    </form>
</body>
</html>

<script>
    function finalizarVenda() {
        if (document.getElementById('cliente')?.value > 0) {
            window.location.href = `finalizarVenda.php?idCliente=${document.getElementById('cliente').value}`;
        }
    }
</script>