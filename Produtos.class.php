<?php

class Produtos
{
    public $codProduto;
    public $quantProduto;
    public $precoUn;

    public function __construct($codProduto, $quantProduto, $precoUn)
    {
        $this->codProduto = $codProduto;
        $this->quantProduto = $quantProduto;
        $this->precoUn = $precoUn;
    }

    public function getCodigo(){
        return $this->codProduto;
    }

    public function setCodigo($codProduto){
        $this->codProduto = $codProduto;
    }

    public function getQuantidade(){
        return $this->quantProduto;
    }

    public function setQuantidade($quantProduto){
        $this->quantProduto = $quantProduto;
    }

    public function getPreco(){
        return $this->precoUn;
    }

    public function setPreco($precoUn){
        $this->precoUn = $precoUn;
    }
}

?>