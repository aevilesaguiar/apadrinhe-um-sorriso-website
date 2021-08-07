<?php

    function consulta_acesso($usuario,$senha){// Seleciona usuário e senha

        $select = 'SELECT * FROM usuario where usuario="'.$usuario.'" and senha="'.$senha.'"';

        return $select;

    }

    function consulta_perfil($id_usuario){// Seleciona usuário de acordo com seu cadastro.

            $select = 'SELECT * FROM perfil where usuario_idusuario="'.$id_usuario.'"';//Seleciona usuário
                    
        return $select;

    }

    function consulta_dados_gerais($dados_gerais_id){
        
        $select = 'SELECT * FROM dados_gerais where id="'.$dados_gerais_id.'"';//Seleciona usuário
                    
        return $select;
    }


?>