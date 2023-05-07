<?php

class Produtos
{
    public $codProduto;
    public $quantProduto;
    public $precoUn;
    public $idCliente;
    public $dataVenda;

    public function __construct($codProduto, $quantProduto, $precoUn, $idCliente, $dataVenda)
    {
        $this->codProduto = $codProduto;
        $this->quantProduto = $quantProduto;
        $this->precoUn = $precoUn;
        $this->idCliente = $idCliente;
        $this->dataVenda = $dataVenda;
    }
}

?>