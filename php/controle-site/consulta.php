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

    function cpf($id_cadastro){
        include "php/geral/conexao-banco.php"; 
        $select ='SELECT * FROM dados_pf where fk_id_cadastro="'.$id_cadastro.'"';
        $dados_pf = $conecta->query($select);

        if($conta=$dados_pf->num_rows==1){
        foreach($dados_pf as $cpf){
            return $cpf['cpf'];
        }
    }else{
        return "";
    }
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
    function consulta_status_doacao($id_doacao){
        $select = 'SELECT status_doacao FROM doacao
         where id_doacao="'.$id_doacao.'"';
            return $select;
    }

    function consulta_mensagem($id_cadastro){
        $select = 'SELECT id.status_cadastro,ms.id_mensagem,ms.status_sistema,ms.mensagem FROM perfil id 
        inner join perfil_exibe pe on pe.fk_id_cadastro=id.id_cadastro
        inner join mensagem_sistema ms on ms.id_mensagem=pe.fk_id_mensagem
         where id.id_cadastro="'.$id_cadastro.'"';
            return $select;
    }

    function consulta_mensagem_doacao($id_doacao){
        $select = 'SELECT ms.mensagem,MS.status_sistema,ms.id_mensagem FROM doacao d 
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
    function consulta_cadastro_pj($id_cadastro){
        $select = 'SELECT * FROM perfil p 
        inner join dados_pj dpj on dpj.fk_id_cadastro=p.id_cadastro 
        inner join usuario u on u.user=p.fk_user where p.id_cadastro="'.$id_cadastro.'"';

        return $select;
    }
    function consulta_cadastro_colaborador_organizacao($id_cadastro_colaborador){
        $colaborador = 'SELECT * FROM perfil p
                            INNER JOIN possui_colab pc
                            ON pc.fk_id_colaborador=p.id_cadastro
                            INNER JOIN dados_pj dp
                            ON dp.cnpj=pc.fk_cnpj
                            WHERE pc.fk_id_colaborador="'.$id_cadastro_colaborador.'"';
        
        return $colaborador;
    }

    function consulta_doador($id_doacao){
         //Seleciona doações referente a organização logada
  $search = 'SELECT re.nome, b.nome_crianca, c.id_doacao,re.tipo_cadastro,re.id_cadastro
  FROM perfil a
  INNER JOIN gerencia d
  ON d.fk_id_cadastro=a.id_cadastro
  INNER JOIN realiza r
  ON r.fk_id_doacao=d.fk_id_doacao
  INNER JOIN perfil re
  ON re.id_cadastro=r.fk_id_cadastro
  INNER JOIN doacao c
  ON c.id_doacao = d.fk_id_doacao
  INNER JOIN dados_crianca b
  ON b.rg_crianca = c.fk_rg_crianca
  
  WHERE c.data_hora_recebimento IS NULL AND r.fk_id_doacao="'.$id_doacao.'"';

return $search;
    }

    function consulta_entrega_doacao($id_organizacao){//Função seleciona todas as entregas pendentes da organização
        $search = 'SELECT df.cpf,re.nome, b.nome_crianca, c.id_doacao,c.data_hora_entrega,c.doc_confirmacao
                FROM perfil a
                INNER JOIN gerencia d
                ON d.fk_id_cadastro=a.id_cadastro
                INNER JOIN realiza r
                ON r.fk_id_doacao=d.fk_id_doacao
                INNER JOIN perfil re
                ON re.id_cadastro=r.fk_id_cadastro
                INNER JOIN doacao c
                ON c.id_doacao = d.fk_id_doacao
                INNER JOIN dados_crianca b
                ON b.rg_crianca = c.fk_rg_crianca
                INNER JOIN possui_cri pc
                ON pc.fk_rg_crianca=b.rg_crianca
                INNER JOIN dados_responsavel dr
                ON dr.id_familia=pc.fk_id_familia
                INNER JOIN dados_pf df
                ON df.fk_id_cadastro=dr.fk_id_cadastro
                
                WHERE c.data_hora_recebimento IS NOT NULL AND d.fk_id_cadastro="'.$id_organizacao.'"';
        return $search;
    }

    function consulta_familia($id_cadastro_org,$id_cadastro_familia){//Seleciona dados familia
        $familia = 'SELECT dc.*, p.*,df.*,dr.*
                FROM cadastra c
                INNER JOIN dados_crianca dc
                ON dc.rg_crianca=c.fk_rg_crianca
                INNER JOIN possui_cri pc
                ON pc.fk_rg_crianca=dc.rg_crianca
                INNER JOIN dados_responsavel dr
                ON dr.id_familia=pc.fk_id_familia
                INNER JOIN perfil p
                ON p.id_cadastro=dr.fk_id_cadastro
                INNER JOIN dados_pf df
                ON df.fk_id_cadastro=p.id_cadastro WHERE c.fk_id_cadastro="'.$id_cadastro_org.'" 
                AND p.id_cadastro="'.$id_cadastro_familia.'"';
        
        return $familia;
    }

    function consulta_colaboradores_organizacao($id_cadastro_org){

        $colaboradores = 'SELECT p.*,c.* FROM dados_pj dp
                            INNER JOIN possui_colab pc
                            ON pc.fk_cnpj=dp.cnpj
                            INNER JOIN perfil p
                            ON p.id_cadastro=pc.fk_id_colaborador
                            INNER JOIN colaborador c
                            ON c.fk_id_cadastro=p.id_cadastro WHERE dp.fk_id_cadastro="'.$id_cadastro_org.'"';
        
        return $colaboradores;

    }
?>