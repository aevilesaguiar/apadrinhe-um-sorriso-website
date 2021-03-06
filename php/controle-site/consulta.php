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

    function cnpj($id_cadastro){
            include "php/geral/conexao-banco.php"; 
            $select ='SELECT * FROM dados_pj where fk_id_cadastro="'.$id_cadastro.'"';
            $cnpj = $conecta->query($select);

            if($conta=$cnpj->num_rows==1){
            foreach($cnpj as $bcnpj){
                return $bcnpj['cnpj'];
            }
        }else{
            return "";
        }
    }

    function lista_criancas($codigo_organizacao){
            $select = 'SELECT dc.*
             FROM dados_crianca dc inner join cadastra c on dc.rg_crianca=c.fk_rg_crianca
                                    where c.fk_id_cadastro ="'.$codigo_organizacao.'"';
            return $select;
    }

    function consulta_doacao($id_doacao){

            $select = 'SELECT g.*,d.*,dc.*,p.* FROM gerencia g inner join realiza r on g.fk_id_doacao=r.fk_id_doacao
                                                    inner join doacao d on d.id_doacao = g.fk_id_doacao
                                                    inner join dados_crianca dc on dc.rg_crianca=d.fk_rg_crianca
                                                    inner join perfil p on p.id_cadastro=g.fk_id_cadastro
                                                    where g.fk_id_doacao="'.$id_doacao.'"';
            return $select;

    }

    function lista_doacoes_realizadas($id_cadastro){
        $select = 'SELECT g.*,d.*,dc.*,p.* FROM gerencia g inner join realiza r on g.fk_id_doacao=r.fk_id_doacao
                                                    inner join doacao d on d.id_doacao = g.fk_id_doacao
                                                    inner join dados_crianca dc on dc.rg_crianca=d.fk_rg_crianca
                                                    inner join perfil p on p.id_cadastro=g.fk_id_cadastro
                                                    where  r.fk_id_cadastro="'.$id_cadastro.'" ORDER BY d.id_doacao DESC';
            return $select;
    }

    function consulta_status_cadastro($id_cadastro){
        $select = 'SELECT status_cadastro FROM perfil
         where id_cadastro="'.$id_cadastro.'"';
            return $select;
    }

    function consulta_mensagem($id_cadastro){
        $select = 'SELECT id.status_cadastro,ms.status_sistema,ms.mensagem FROM perfil id 
        inner join perfil_exibe pe on pe.fk_id_cadastro=id.id_cadastro
        inner join mensagem_sistema ms on ms.id_mensagem=pe.fk_id_mensagem
         where id.id_cadastro="'.$id_cadastro.'"';
            return $select;
    }

    function consulta_mensagem_doacao($id_doacao){
        $select = 'SELECT ms.mensagem,MS.status_sistema FROM doacao d 
        inner join doa_exibe de on de.fk_id_doacao=d.id_doacao
        inner join mensagem_sistema ms on ms.id_mensagem=de.fk_id_mensagem
        where d.id_doacao="'.$id_doacao.'"';
        return $select;
    }

    function consulta_cadastro_pf($id_cadastro){
        $select = 'SELECT * FROM perfil p 
        inner join dados_pf dpf on dpf.fk_id_cadastro=p.id_cadastro 
        inner join usuario u on u.user=p.fk_user where p.id_cadastro="'.$id_cadastro.'"';

        return $select;
    }
?>