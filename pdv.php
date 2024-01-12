<?php

class Produto
{
    protected $nome;
    protected $preco;
    protected $quantidade;

    public function __construct($nome, $preco, $quantidade)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    public function setProduto($data)
    {
        $this->nome = $data['nome'];
        $this->preco = $data['preco'];
        $this->quantidade = $data['quantidade'];
    }

    public function getProduto()
    {
        return "Produto: {$this->nome}, Preço: {$this->preco}, Quantidade: {$this->quantidade}";
    }
}

class Venda extends Produto
{
    private $quantidadeVenda;
    private $desconto;

    public function __construct($nome, $preco, $quantidade)
    {
        parent::__construct($nome, $preco, $quantidade);
    }

    public function setVenda($data)
    {
        if (!$this->nome) {
            echo "Produto não cadastrado. Realize o cadastro primeiro.";
            return;
        }

        if ($this->quantidade < $data['quantidadeVenda']) {
            echo "Estoque insuficiente.";
            return;
        }

        $this->quantidadeVenda = $data['quantidadeVenda'];
        $this->desconto = $data['desconto'];

        $this->atualizarEstoque($this->quantidadeVenda);

        return $this->getVendaDetails();
    }

    private function atualizarEstoque($quantidadeVendida)
    {
        $this->quantidade -= $quantidadeVendida;
    }

    private function getVendaDetails()
    {
        return "Venda realizada - " . $this->getVenda() . PHP_EOL
            . "Estoque atualizado - " . $this->getProduto() . PHP_EOL;
    }

    private function getVenda()
    {
        return "Produto: {$this->nome}, Quantidade Vendida: {$this->quantidadeVenda}, Desconto: {$this->desconto}%";
    }
}

// Exemplo de uso
$produto = new Produto('Produto A', 10.99, 50);
echo $produto->getProduto() . PHP_EOL;

$venda = new Venda('Produto A', 10.99, 50);
$resultadoVenda = $venda->setVenda(['quantidadeVenda' => 10, 'desconto' => 5]);

echo $resultadoVenda;
?>
