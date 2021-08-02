Código realizado como proposta de Desafio técnico para empresa VESTI

- Desafio:
    João tem uma loja de confecções e pretente criar um sistema para administrar melhor seus produtos.
    Basicamente o que João precisa é: 
    ● Cadastrar código, categoria, nome, preço, composição, data de cadastro, tamanho e quantidade do produto 
    ● Permitir o upload de até 3 imagens jpg por produto 
    ● Criar um histórico de todas as operações realizadas nos produtos ● O usuário deve estar autenticado em todas as operações do sistema 

- Pré-requisitos: 
    ● Desenvolver uma API REST em PHP 8 utilizando a framework Laravel 8 ● Pode escolher qual banco de dados utilizar 
    ● Criar um README.md explicando como rodar a aplicação 
_______________________________________________________________________________________________________________________________________________


A API REST foi desenvolvida utilizando o framework Laravel 8.
- Os testes de CRUD foram realizado utilizando o Postman.
- Foi utilizado o banco de dados MySql (phpmyadmin)
- A Criação da Tabela do banco de dados está em: database/migrations/2021_08_02_132427_create_models_produtos_table.php
- O procedimento do CRUD está em: app/Http/Controllers/apiProdutoController.php
- Resource API: routes/api.php
- Página de criação da Tabela no banco de dados: app/Http/Controllers/apiProdutoController.php
- O tratamento da quantidade de imagens para upload acontece na linha 37: app/Http/Controllers/apiProdutoController.php
