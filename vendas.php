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
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        echo "<label>Código produto </label>";
        echo "<input type='number' name='codProduto' required>";
        echo "</p>";
        echo "<label>Quantidade </label>";
        echo "<input type='number' name='quantProduto'>";
        echo "</p>";
        echo "<label>Preço unitário </label>";
        echo "<input type='text' name='precoUn'>";
        echo "</p>";
        echo "<label>ID cliente </label>";
        echo "<input type='numb' name='idCliente' maxlength='6'>";
        echo "</p>";
        echo "<labelnd>Data da venda </label>";
        echo "<input type='text' name='dataVenda'>";
        echo "</p>";
        echo "<button class='button, alinhando'>OK</button>";
        echo "<button class='button, alinhando' onclick='finalizarVenda()'>Finalizar venda!</button>";

        include "Produtos.class.php";
        if (!isset($_SESSION['produtos'])) {
            $produtos = array();
        } else {
            $produtos = unserialize($_SESSION['produtos']);
        }
        if (array_key_exists('codProduto', $_POST) && !array_key_exists($_POST['codProduto'], $produtos)) {
            array_push($produtos, new Produtos($_POST['codProduto'], $_POST['quantProduto'], 0, 0, 0));
            // array_push($produtos, new Produtos($_POST['codProduto'], $_POST['quantProduto'], $_POST['precoUn'], $_POST['idCliente'], $_POST['dataVenda']));
            print_r($produtos);
            $_SESSION['produtos'] = serialize($produtos);
        }
        ?>
    </form>
</body>

</html>