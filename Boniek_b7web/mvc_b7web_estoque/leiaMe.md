# MVC - Estoque

Criado por B7Web

    https://alunos.b7web.com.br/curso/lives/criando-um-sistema-de-estoque-ao-vivo

## Projeto
Sistema de estoque
    - Login Basico com Token
    - Cadastro de Produtos ( Com busca por codigo ou nome );
    - Relatório de Produtos;
    - Tarefa Extra

Onde encontrar a base do Projeto:

    https://www.b7web.com.br/arquivos/mvc_puro.zip

## Estrutra
    - Laragon Full 5.0.0
    - PHP 7.4.19
    - Apache 2.4.47 usando a porta 80
    - MySQL 5.7.33 usando a porta 3306

## Será usado
    - Login com token
    - Cadastro de Produto 
    - Relatório de Produto


## Banco de Dados

Nome do banco de dados `base_de_teste`

    CREATE DATA BASE base_de_teste;

Tabela `usuario`

    CREATE TABLE IF NOT EXISTS usuario (
        id int(11) NOT NULL AUTO_INCREMENT,
        login VARCHAR(32),
        senha varchar(32),
        email varchar(100), 
        token varchar(32), 
        PRIMARY KEY (`id`)
    );

Tabela `produto`

    CREATE TABLE IF NOT EXISTS produto (
        id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        codigo int(11),
        nome varchar(50),
        qtd_atual double(15,4),
        qtd_minima double(15,4),
        preco double (15,4)

    );

Inserindo dados na tabela `usuario`

    USE base_de_teste ;
    INSERT INTO usuario ( login, senha ) VALUES ('isabel', MD5(123));

Inserindo dados na tabela `produto`

    INSERT INTO produto ( codigo, nome, qtd_atual, qtd_minima, preco ) 
    VALUES 
    (111, 'cadeira', 3, 6 , '12.5'),
    (222, 'mesa', 2, 5, '130.50');


Inserindo novo campo na tabela produto

    ALTER TABLE produto ADD situacao VARCHAR(1) NOT NULL DEFAULT 'A';

## Mãos a obra

Organizando o `.htacess` para acessar a pagina correta

    RewriteRule ^(.*)$ /mvc_b7web_estoque/index.php/$1 [L]

Organizando o `config.php` para acessar o banco correto;

Criando o Models `Usuario.php` que será a primeira página no sistema;

Endereço da pagina de login: `https://codepen.io/frytyler/pen/nJYVEO`

Fazer login - ok 
Mostrar produtos cadastrados - ok
Cadstrar novo produto - ok 
Editar produto ja cadastrado - ok 
Deletar produto ( troca de status do produto de 'A' para 'E') - ok 
Buscar produto ( por codigo e/ ou nome ) -  ok 
Relatorio dos produtos a serem comprados - ok 



Fazer:
    - validação se código ja existe;
    - validar os campos quantidade,  nome, quantidade minima e preço;

    HISTORICOS
     - Adicionar as vendas e criar o histórico do que aconteceu ;

 

 Finalizado!!!

 