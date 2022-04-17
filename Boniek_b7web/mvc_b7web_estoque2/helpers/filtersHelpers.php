<?php

class FiltersHelpers {
    //não precisa extender nenhuma outra classe pois ele é indepentente

    //recortar a functio filter da HomeControler e adicionar a qui . 
    public function filter_post_money( $t){
        $preco = filter_input( INPUT_POST, $t);
        $preco = str_replace('.', '', $preco) ;
        $preco = str_replace(',', '.', $preco);
        $preco = filter_var( $preco , FILTER_VALIDATE_FLOAT);

        return $preco ;
 
    }


}
?>