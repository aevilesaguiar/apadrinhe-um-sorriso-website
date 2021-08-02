<?php

include "../geral/conexao-banco.php"; //Conexao com o banco de dados
include "redirecionamento-pagina.php"; //Registro de todas as paginas para redirecionamento
include "mensagens.php";// Registro de todas mensagens do sistema
include "sessao.php"; //Inicia sessao e encerra sessões
include "consulta.php"; //Consultas ao banco de dados

if($conecta->connect_error){//Se houver erro na conexao com o banco de dados

    echo mensagem(2);//Mensagem de falha
    

}else{// Caso contrário executa o código
    
    // Consulta usuário no banco de dados e redireciona usuário de acordo com seu nivel de acesso.
    
    $conta=0;
    $resultado=$conecta->query(consulta_acesso($_POST['usuario'],$_POST['password']));
    
    if($_POST['usuario']=='admin' && $_POST['password']=='admin'){
        sessao_login($_POST['usuario']);
        redireciona(0);
    
    }else if($conta=$resultado->num_rows==1){// Se for encontrado usuario e senha, autoriza a entrada do usuário.
        
        foreach($resultado as $dados){

        }
           
            $resultado_org=$conecta->query(consulta_tipo_usuario('ORGANIZACAO',$dados['id_usuario']));// consulta usuario na tabela cadastro organização com o id do usuário encontrado
            $resultado_pj=$conecta->query(consulta_tipo_usuario('PESSOA_JURIDICA',$dados['id_usuario']));// consulta usuario na tabela cadastro pj com o id do usuário encontrado
            $resultado_pf=$conecta->query(consulta_tipo_usuario('PESSOA_FISICA',$dados['id_usuario']));// consulta usuario na tabela cadastro pf com o id do usuário encontrado

            if($conta=$resultado_org->num_rows==1)//Se a quantidade de usuário for  no máximo igual a 1 para um usuario da organização autoriza a entrada
            {
                redireciona(1);//Pagina controle ONG
            }else if($conta=$resultado_pj->num_rows==1)//Se a quantidade de usuário for  no máximo igual a 1 para um usuario de pessoa juridica autoriza a entrada
            {
                redireciona(0);//Redireciona Pagina controle apadrinho
            }else if($conta=$resultado_pf->num_rows==1)//Se a quantidade de usuário for  no máximo igual a 1 para um usuario de pessoa fisica autoriza a entrada
            {
                redireciona(0);//Redireciona Pagina controle apadrinho
            }

        sessao_login($_POST['usuario']);
        
    }else{

        sessao_mensagem(mensagem(0));//Cria uma mensagem de erro na sessao caso o usuario digite usuario ou senha incorreta
       redireciona(3); //retorna a tela de login

    }


}


?>