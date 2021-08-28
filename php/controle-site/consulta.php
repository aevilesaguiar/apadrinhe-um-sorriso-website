<?php

    function consulta_acesso($usuario,$senha){// Seleciona usuário e senha

        $select = 'SELECT * FROM usuario where user="'.$usuario.'" and senha="'.$senha.'"';

        return $select;

    }

    function consulta_perfil($id_usuario){// Seleciona usuário de acordo com seu cadastro.

            $select = 'SELECT * FROM perfil where fk_user="'.$id_usuario.'"';//Seleciona usuário
                    
        return $select;

    }

    function lista_organizacao(){
            $select = 'SELECT * FROM  perfil where tipo_cadastro="organizacao"';

            return $select;
    }

    function lista_criancas($codigo_organizacao){
            $select = 'SELECT dc.*
             FROM dados_crianca dc inner join cadastra c on dc.rg_crianca=c.fk_rg_crianca
                                    where c.fk_id_cadastro ="'.$codigo_organizacao.'"';
            return $select;
    }
?>