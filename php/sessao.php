<?php
session_start();

function sessao_login($usuario){ //Inicia sessão de login

    unset($_SESSION['mensagem']);

    $_SESSION['usuario'] = $usuario;
    $_SESSION['email'] = "marco@hotmail.com";
    $_SESSION['telefone'] = "(11)9 89898-4556";
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