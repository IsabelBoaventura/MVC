# MVC com PHP

* PHP 7.4.19
* composer 2.2.7

## Video 02

    MVC em PHP: Implementando um gerenciador de rotas - Série MVC em PHP - Parte 2

    https://www.youtube.com/watch?v=7fxguLAebl4&list=PL_zkXQGHYosGQwNkMMdhRZgm4GjspTnXs&index=2

Continuação do video  01 - trabalhando com as rotas.

## Rotas

Gerenciamento de Rotas

classe de request e classe de respostas;


App/Http
    request.php

Testado  o Request para verificar se estava funcionado;

Apenas com o echo e print_r no arquivo `index.php` aparecendo na tela;

Com o caminho: 

    http://localhost/mvc/WillianCosta/wdev/02-01/?teste=123

Houve resposta na tela também:

    App\Http\Request Object
(
    [httpMethod:App\Http\Request:private] => GET
    [uri:App\Http\Request:private] => /mvc/WillianCosta/wdev/02-01/?teste=123
    [queryParams:App\Http\Request:private] => Array
        (
            [teste] => 123
        )

    [postVars:App\Http\Request:private] => Array
        (
        )

    [headers:App\Http\Request:private] => Array
        (
            [Host] => localhost
            [Connection] => keep-alive
            [sec-ch-ua] => " Not A;Brand";v="99", "Chromium";v="98", "Opera";v="84"
            [sec-ch-ua-mobile] => ?0
            [sec-ch-ua-platform] => "Windows"
            [Upgrade-Insecure-Requests] => 1
            [User-Agent] => Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 OPR/84.0.4316.21
            [Accept] => text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
            [Sec-Fetch-Site] => none
            [Sec-Fetch-Mode] => navigate
            [Sec-Fetch-User] => ?1
            [Sec-Fetch-Dest] => document
            [Accept-Encoding] => gzip, deflate, br
            [Accept-Language] => pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7
            [Cookie] => SIMPLES_CONTROLE=13qt07pek4001on4mu017l4du3
        )

)


Replicando a mesma situação para o Response

        App\Http\Response Object
        (
            [httpCode:App\Http\Response:private] => 200
            [headers:App\Http\Response:private] => Array
                (
                    [Content-Type] => text/html
                )

            [contentType:App\Http\Response:private] => text/html
            [content:App\Http\Response:private] => Ola Mundo
        )

Certo com o exemplo também.


## Rotas

Criando as rotas;

Definindo o arquivo `App\Http\Router.php`;

Resposta da função parse_url:

    Array
        (
            [scheme] => http
            [host] => localhost
            [path] => /mvc/WillianCosta/wdev/02-01
        )

