# MVC em PHP 

Séries de vídeos de **WDEV** ensinando a estrutura MVC em PHP 

> Título: MVC em PHP: Conceito e início do projeto - Série MVC em PHP - Parte 1


> Caminho:  https://www.youtube.com/watch?v=TmeyoTNu748&list=PL_zkXQGHYosGQwNkMMdhRZgm4GjspTnXs&index=1




## Requisitos

* PHP (usando a versão 7.4.19)
* Composer (usando a versão 2.3.10)

## Comandos

> Rodar o php: <code>php  -S localhost:8000 </code>


## Arquitetura

> Caminho absoluto  no meu pc: D:\documentos\Praticando\MVC\WillianCosta\wdev\projeto_01

Criando o projeto

- :card_file_box: projeto_01
	- :page_facing_up: composer.json	
	- :page_facing_up: index.php	
	- :open_file_folder: app
		- :open_file_folder: Controller
			- :open_file_folder: Pages 
				- :page_facing_up: Home.php 
		- :open_file_folder: Utils 
			- :page_facing_up: View.php 
	- :open_file_folder: resources
		- :open_file_folder: View
			- :open_file_folder: Pages
				- :page_facing_up: Home.php 			

## Aulas 

- [ ]  Parte 01: Conceito e Inicio do Projeto;
- [ ]  Parte 02: Implementando um gerenciador de rotas;
- [ ]  Parte 03: CRUD, paginação e variáveis de Ambiente;
- [ ]  Parte 04: Conhecendo e implementando middlewares;
- [ ]  Parte 05: Autenticação de usuários;
- [ ]  Parte 06: Painel de Administração Completo;
- [ ]  Parte 07: Implementando APIs;
- [ ]  Parte 08: HTTP Basic Auth - Autenticando APIs;
- [ ]  Parte 09: Autenticação via JWT - JSON web token;
- [ ]  Parte 10: Gerenciamento de cache;
- [ ]  Parte 11: Dúvidas e Conclusão;


## Explicações


MVC 
Model
View 
Controller

MVC é a divisão das responsabilidades da aplicação em tres partes; 

**Model**: Gerencia as regras de negócios, manipular dados, gerenciar as conexoes com o banco de dados. Tudo o que for relacionado a obtenção ou persistência de dados na aplicação. 

**View**: parte externa do projeto, tudo o que o usuário irá ver. Código em HTML que o computador interpreta é a view. 

**Controller**: responsável por fazer uma ponto entre os dados obtidos no Model e a exibição dos dados na View.  É o controller que processa as requisições, e dispara as ações da Model.

Dentro da pasta principal ( projeto_01 ) iremos criar o arquivo  "composer.json" onde será configurado o projeto.

Rodamos o composer <code> composer install </code>

Criando as pastas e arquivos default do composer (pasta: vendor, arquivo: autoload);

Criamos na raiz do projeto o arquivo index.php; 

E colocamos o projeto para rodar pela primeira vez <code>php  -S localhost:8000 </code>


Criando a pasta "app" dentro do projeto principal. E dentro da pasta app, a primeira pasta de separação da organização do projeto, a pasta "Controller";

Será na pasta "Controller" que estará armazenado todos os controladores do projeto. Os controladores são as pontes entre as Views e as Models. 

Controller não deve mostrar o conteudo direto, ele deve mostrar o que a view encaminha para ele. 

Criada a pasta "resources" na raiz do projeto, esta pasta será responsável por guardar os arquivos de auxilio ao sistema ( html, css, javascript, imagens, ... ); 

Dentro da pasta "resources" a pasta "view", dentro da pasta view, a pasta "Pages" e dentro da pasta "Pages"  o arquivo "Home.html";


Dentro da pasta "app" iremos criar a pasta "Utils" aqui estará os utilitários do projeto( ???). Classe para gerenciar o acesso as views. 
Dentro desta pasta iremos criar o arquivo "view.php" ; 


Até o momento temos o controlador , que recebe uma requisição e chama a view para retornar a informação da página. 

Vamos trabalhar com dados dinâmicos para serem adicionados dentro da View. 

O método de renderização irá receber uma array com variáveis. Dentro da getHome (view -> Home )iremos passar alguns dados para o sistema . Passamos a array com o indice e o conteudo. 


No método de renderização da View pode se ver a entrada da array. Fizemos um debug apenas para ver se estava chegando as informações na tela 

~~~php
 echo '<pre>';
        print_r( $vars);
        echo '</pre>';
        exit;
~~~~

Traz na tela a seguinte informação:

<code>
array
(
    [nome] => WDEV - Canal
    [descrição] => Canal do Youtube: https://youtube.com.br/wdevoficial
)
</code>


O  que significa que esta trazendo as informações passadas pelo getHome ( view -> Home.php);

Estas variáveis tem de serem passadas para a página de visualização, no caso a home ( view -> Pages -> Home.html).
Para representar varivel iremos usar a mesma forma que o Vue.js usa, ou seja '{{' e '}}' e tudo o que estiver entre as abertura dupla de chaves e fechamento duplo de chaves será considerado uma variável. 

Na view onde recebemos a array, precisamos descobrir qual o nome dos indíces para podermos passar para a view que apresenta as informações. Descobrir as chaves dos arrays. 

Para descobrir as chaves dos arrays iremos usar a função do PHP `array_keys`.

Esta função nos tratará como resposta uma array onde o índice começa em zero e o conteudo é o nome das chaves da array passada para a função. 

Como na pagina onde será mostrado os dados,  indentidicamos que as variaveis seriam tudo o que estevissem entre chaves duplas,  precisamos fazer a troca  da variável pelo seu conteudo. Para isto usaremos a função do  php `array_map`. 

A função ```array_map```  neste exemplo, irá descobrir os nossos indices da array,  irá mapear os indices e adiciona os caracteres que escolhemos para ser marcadores de variáveis, ou seja, irá montar eles da mesma forma que a página  que mostra na tela esta esperando, neste exemplo {{name}}; 

Agora vamos substituir os dados na view.
Vamos usar o  ```array_values``` para obter os valores da array. 


~~~php
return  str_replace( $keys, array_values($vars) , $contentView); 
~~~


Adicionado o bootstrap e fazer o layout que será reutilizado em todas as paginas. 

Dentro da pasta 'View' , dentro da pasta 'Pages' criaremos o arquivo "Page.hmtl". Acrescentamos o codigo bootstrap básico nesta página, e criamos o controlador para esta página "Page.php" ( Controller -> Pages ->Page.php );

Dentro do controller page,  iremos criar a função getPage que receberá os argumentos que passará para a view page.

A View 'Home' irá extender a view 'Page'.

O simples fato deu ter colocado o titulo como uma variavel e não como uma string nao funcionou como no video. 


Acrescentar o Header e o Footer na página genérica.
Criamos as Views 'Header.html' e 'footer.html'.










parando em 12:23 de video 
















