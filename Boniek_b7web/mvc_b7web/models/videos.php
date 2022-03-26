<?php

use \core\Model;

class videos extends model{

    public function getList( $qtd ){
        $array = array();

        $sql = "SELECT * FROM videos LIMIT ".$qtd;
        $sql = $this->db->query($sql);

        if( $sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array ;

    }

}

?>