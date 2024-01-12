<?php

class Produto
{
    // Propriedades para armazenar informações do produto
    protected $nome;
    protected $preco;
    protected $quantidade;

    // Construtor para inicializar as propriedades do produto
    public function __construct($nome, $preco, $quantidade)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    // Método para atualizar informações do produto com base em um array
    public function setProduto($data)
    {
        $this->nome = $data['nome'];
        $this->preco = $data['preco'];
        $this->quantidade = $data['quantidade'];
    }

    // Método para obter uma string formatada com detalhes do produto
    public function getProduto()
    {
        return "Produto: {$this->nome}, Preço: {$this->preco}, Quantidade: {$this->quantidade}";
    }
}

class Venda extends Produto
{
    // Propriedades adicionais para vendas
    private $quantidadeVenda;
    private $desconto;

    // Construtor que chama o construtor da classe pai (Produto)
    public function __construct($nome, $preco, $quantidade)
    {
        parent::__construct($nome, $preco, $quantidade);
    }

    // Método para registrar uma venda
    public function setVenda($data)
    {
        // Verifica se o produto está cadastrado
        if (!$this->nome) {
            echo "Produto não cadastrado. Realize o cadastro primeiro.";
            return;
        }

        // Verifica se há estoque suficiente para a venda
        if ($this->quantidade < $data['quantidadeVenda']) {
            echo "Estoque insuficiente.";
            return;
        }

        // Registra a venda, atualiza o estoque e retorna detalhes da venda
        $this->quantidadeVenda = $data['quantidadeVenda'];
        $this->desconto = $data['desconto'];

        $this->atualizarEstoque($this->quantidadeVenda);

        return $this->getVendaDetails();
    }

    // Método privado para atualizar o estoque após a venda
    private function atualizarEstoque($quantidadeVendida)
    {
        $this->quantidade -= $quantidadeVendida;
    }

    // Método privado para obter detalhes da venda
    private function getVendaDetails()
    {
        return "Venda realizada - " . $this->getVenda() . PHP_EOL
            . "Estoque atualizado - " . $this->getProduto() . PHP_EOL;
    }

    // Método privado para obter detalhes específicos da venda
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