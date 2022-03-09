<?php

namespace App\Http;

use \Closure;
use \Exception;
use FFI\Exception as FFIException;

class Router{
    private $url = ''; //url completa do projeto (raiz)
    private $prefix = '';//prefixo de todas as rotas 
    private $routes =[]; //guarda todas as rotas do projeto
    private $request; 

    public function __construct( $url )
    {
        $this->request = new Request();
        $this->url = $url ;
        //prefixo da rota sendo definido dinamicamente 
        $this->setPrefix();
    }

    /**Metodo responsavel  por definir o prefixo das rotas  */
    private function setPrefix(){
        $parseUrl = parse_url( $this->url);
        // informações da url
        // echo '<pre>';
        // print_r( $parseUrl );
        // echo '</pre>';

        //defi8ne o prefixo 
        $this->prefix = $parseUrl['path'] ?? '';

        // echo '<pre>';
        // print_r( $parseUrl );
        // echo '</pre>';
    }


    /**Metodos responsavel  por adicionar uma rota na classe 
     * @param string $method
     * @param string $route 
     * @param array $params  */
    private function  addRoute( $method,  $route,  $params =[] ){

        echo '<pre>';
        echo ' <br>metodo: ';
        print_r( $method );
        echo '<br> rota: ';     
        print_r( $route );
        echo '<br> parametros: ';       
        print_r( $params );
        echo '</pre>';
        echo ' <br> Estes dados que foram recebidos, agora tem de serem adicionados nas rotas <br>';

        echo '<br> validacao dos parametros<br>';
        echo '<pre>antes: ';
        print_r( $params  );
        echo '</pre>';

        foreach($params as $key=>$value ){
            if( $value instanceof Closure ){
                //execução do controlador 
                $params['controller'] = $value;
                unset($params[$key]);

                continue;
            }
        }
        echo '<pre><br>Depois: ';
        print_r( $params  );
        echo '</pre>';

        //padrão para poder validar a rota
        //exprssao regular para controlar a rota 
        $patternRoute = '/^'. str_replace('/',  '\/', $route). '$/';

        //adiciona a rota dentro da classe 
        $this->routes[$patternRoute][$method] = $params ;

        echo '<pre> rota validada com expressao regular:<br> ';
        print_r(   $this );
        echo '</pre>';



    }

  



    /**metodo responsabel por defineir as rotas de get
     * @param string $route
     * @param array $params
     */
    public function get( $route, $params = [] ){
        $this->addRoute('GET', $route,  $params ); 
    }


    /**metodo responsabel por defineir as rotas de post
     *  @param string $route
     * @param array $params
     */
    public function post( $route, $params = [] ){
        $this->addRoute('POST', $route,  $params ); 
    }



    /**metodo responsabel por defineir as rotas de put ALTERACAOES 
     *  @param string $route
     * @param array $params
     */
    public function put( $route, $params = [] ){
        $this->addRoute('PUT', $route,  $params ); 
    }


    /**metodo responsabel por definir as rotas de DELETE 
     * Estara ativo apenas no sistema de teste 
     * Em producao nao sera mais usado  
     *  @param string $route
     * @param array $params
     */
    public function delete( $route, $params = [] ){
        $this->addRoute('DELETE', $route,  $params ); 
    }



    
    /**Metodo responsavel por retornar a URI desconsiderando o prefixo  */
    private function getUri(){
        //uri da regquest 
        $uri = $this->request->getUri();

        // echo '<pre>';
        // print_r(   $uri  );
        // echo '</pre>';

            //fatiar a url com o prefixo
        $xUri = strlen( $this->prefix ) ? explode( $this->prefix, $uri ) : [$uri];

      

        //      echo '<pre> router getUri ( 104):<br> ';
        // print_r(   $xUri  );
        // echo '</pre>';

          //retorna a ultima posicao da uri
          return end( $xUri);

    }



      /**Retorna os arrays da rota atual  */
    private function getRoute(){
       
    
       
       //retorna a uri 
        $uri = $this->getUri();

        // echo '<pre> router getRoute (120):<br> ';
        // print_r(   $uri  );
        // echo '</pre>';


        /**Metodo da requisicao  */
        $httpMethod = $this->request->getHttpMethod();

        //validar as rotas 
        foreach( $this->routes as $patternRoute  => $methods){
            //   echo '<pre> router getRoute (132):<br> ';
            // print_r( $patternRoute     );
            // echo '</pre>';

            //verifica se a rota esta adquada ao padrao 
            if( preg_match( $patternRoute, $uri )){
                //verifcar o methodo 
                if( $methods[$httpMethod]){

                    //retorno dos parametros da rota 
                    return $methods[$httpMethod];

                }
                //definicao de metodo não permitido
                throw new Exception('Metodo não  permitido ', 405); 
            }
        }

        // URL não encontrada 
        throw new Exception( 'URL Não encontrada ', 404);
        

    }



    /**Metodo responsvel por executar a rota atual 
     * @return Response 
     */
    public function run(){
        try{
           // throw new Exception ('Papina não encontrada',  404 );
            //descobrir a rota atual 
            $route = $this->getRoute();

            //verifica o controlador 
            if(!isset($route['controller'])){
                throw new Exception( 'URL Não pode ser processada' , 500);
            }

            //ARGUMENTOS DA FUNCAO 
            $args =[];

            //RETORNA A EXECUCAO DA FUNCAO
            return call_user_func_array( $route['controller'], $args);
            // echo '<pre> try - run() Definicao da rota atual:<br> ';
            // print_r(   $route  );
            // echo '</pre>'; 
        }catch( Exception $e){
            return new Response($e->getCode(), $e->getMessage());
        }
    }

}

?>