<?php
session_start();

function sessao_login($nome,$email,$telefone){ //Inicia sessão de login

    unset($_SESSION['mensagem']);

    $_SESSION['usuario'] = $nome;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['telefone'] = $telefone;
    $_SESSION['logado'] = true;

}

function encerra_sessao(){//Encerra sessão de login

    unset($_SESSION['usuario']);
    unset($_SESSION['email']);
    unset($_SESSION['telefone']);
    
    $_SESSION['logado']=false;

}

function sessao_mensagem($mensagem){//Mensagem

    $_SESSION['mensagem']=$mensagem;

}

?>