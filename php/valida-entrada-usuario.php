<?php

include "conexao-banco.php"; //Conexao com o banco de dados
include "redirecionamento-pagina.php"; //Registro de todas as paginas para redirecionamento
include "mensagens.php";// Registro de todas mensagens do sistema
include "sessao.php"; //Inicia sessao e encerra sessões
include "consulta.php"; //Consultas ao banco de dados

if($conecta->connect_error){//Se houver erro na conexao com o banco de dados

    echo mensagem(2);//Mensagem de falha
    

}else{// Caso contrário executa o código
    
    //validação manual de usuario e senha temporária para teste
   if($_POST['usuario']=="admin" && $_POST['password']=="admin"){//Caso o usuário e a senha seja "admin"
        sessao_login($_POST['usuario']);
        redireciona(0); //Redireciona para pagina de apadrinhamento, o apadrinho já pode apadrinhar
    }else{

        sessao_mensagem(mensagem(0));//Mensagem de erro na sessao caso o usuario digite usuario ou senha incorreta
        redireciona(3); //retorna a tela de login

    }

    // validação de usuario e senha definitivo no banco de dados após sua criação 
    /*
    $conta=0;
    $resultado=$conecta->query(consulta_acesso($_POST['usuario'],$_POST['password']));
        
   if($conta=$resultado->num_rows==1){// Se for encontrado usuario e senha, autoriza a entrada do usuário.
        sessao_login($_POST['usuario']);
        redireciona(0); //redireciona para pagina de apadrinhamento, o apadrinho já pode apadrinhar

        
    }else{

        sessao_mensagem(mensagem(0));//Cria uma mensagem de erro na sessao caso o usuario digite usuario ou senha incorreta
       redireciona(3); //retorna a tela de login

    }*/


}


?>