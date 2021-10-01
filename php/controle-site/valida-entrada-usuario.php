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
    
    if($conta=$resultado->num_rows==1){// Se for encontrado usuario e senha, autoriza a entrada do usuário.
        
        foreach($resultado as $dados){

        }
           
            $resultado_perfil=$conecta->query(consulta_perfil($dados['user']));// consulta usuario na tabela cadastro organização com o id do usuário encontrado
        
        foreach($resultado_perfil as $perfil){

        }

            if($conta=$resultado_perfil->num_rows==1)//Se a quantidade de usuário for  no máximo igual a 1 para um usuario da organização autoriza a entrada
            {
                
                sessao_login($perfil['nome'],$perfil['e_mail'],$perfil['telefone'],$perfil['id_cadastro']);

                if($perfil['tipo_cadastro']=="organizacao"){
                    redireciona(1);
                }else if($perfil['tipo_cadastro']=="doador_pj" ||$perfil['tipo_cadastro']=="doador_pf"){
                   redireciona(0);
                    
                }
            }

            
            
        
    }else{

        sessao_mensagem(mensagem(0));//Cria uma mensagem de erro na sessao caso o usuario digite usuario ou senha incorreta
       redireciona(3); //retorna a tela de login

    }


}


?>