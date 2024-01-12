# Desafio técnico: Sistema PDV

Este projeto é parte de um desafio de programação que visa implementar um sistema simples de controle de estoque e vendas em PHP. O código inclui duas classes principais, `Produto` e `Venda`, para gerenciar produtos, realizar vendas e atualizar o estoque.

## Funcionalidades Implementadas

- Cadastro de produtos com nome, preço e quantidade.
- Realização de vendas, verificando a disponibilidade de estoque.
- Atualização automática do estoque após a realização de uma venda.
- Exibição de detalhes do produto e da venda.

## Estrutura do Projeto

- `Produto`: Contém a implementação da classe `Produto` para representar um produto.
- `Venda`: Implementa a classe `Venda`, que herda de `Produto`, para gerenciar o processo de venda.

## Como Usar

1. **Criação de um Produto:**

   ```php
   $produto = new Produto('Nome do Produto', 19.99, 100);
   echo $produto->getProduto() . PHP_EOL;

   ```

2. **Criação de uma Venda:**
   ```php
   $venda = new Venda('Nome do Produto', 19.99, 100);
   $resultadoVenda = $venda->setVenda(['quantidadeVenda' => 10, 'desconto' => 5]);
   echo $resultadoVenda;
   ```
