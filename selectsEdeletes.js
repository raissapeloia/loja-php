function excluirCampo() {
  document.getElementById('excluirCampo');
  window.location.href = '';
}

function selectEstoque() {
  window.location.href = 'selectEstoque.php';
}

function excluirProduto() {
  alert("Tem certeza que deseja excluir este produto ?");
}

function excluirCliente() {
  alert("Tem certeza que deseja excluir este cliente ?");
}

function finalizarVenda() {
  window.location.href = 'insertsVendas.php';
}