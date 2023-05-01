function apagarCampos() {
    // Seleciona todos os elementos de formulário com valor definido
    const elementos = document.querySelectorAll('input:not([type="submit"]), select, textarea');
  
    // Limpa o valor de cada elemento
    elementos.forEach((elemento) => {
      elemento.value = '';
    });
  }