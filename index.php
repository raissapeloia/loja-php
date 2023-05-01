<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
</head>
<body>
    <div>
        <p>
            O que deseja fazer ?
        </p>
    </div>
    <div>
        <script src="funcoesIndex.js"></script>
        <button id="lancarVendas" onclick="lancarVendas()"> Fazer uma vendas </button>
        <button id="lancarPedidos" onclick="lancarPedidos()"> Pedidos </button>
        <button id="cadastroProdutos" onclick="cadastroProdutos()"> Lançar produto no sistema </button>
        <button id="selectEstoque" onclick="selectEstoque()"> Estoque </button>
        <button id="selectClientes" onclick="selectClientes()"> Dados cliente </button>
        <button id="excluirTabela" onclick="excluirTabela()"> Excluir tabela </button>
    </div>
</body>
</html>