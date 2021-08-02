<?php

    function consulta_acesso($usuario,$senha){// Seleciona usuário e senha

        $select = 'SELECT * FROM usuarios where usuario="'.$usuario.'" and senha="'.$senha.'"';

        return $select;

    }

    function consulta_tipo_usuario($tipo_usuario,$id_usuario){// Seleciona usuário de acordo com seu cadastro.

        if($tipo_usuario=='ORGANIZACAO'){
            
            $select = 'SELECT * FROM cadastro_org where usuarios="'.$id_usuario.'"';//Seleciona usuário
            
        }else if($tipo_usuario=='PESSOA_JURIDICA')
        {
            $select = 'SELECT * FROM cadastro_pj where usuarios="'.$id_usuario.'"';//Seleciona usuário
        
        }else if($tipo_usuario=='PESSOA_FISICA'){
            
            $select = 'SELECT * FROM cadastro_pf where usuarios="'.$id_usuario.'"';//Seleciona usuário
        }
        return $select;

    }

    


?>