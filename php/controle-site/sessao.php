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

function mensagens_form($mensagem,$name){
    $_SESSION['mensagens_form'][$name]=$mensagem;
}

function limpa_mensagens_form($name){
    unset($_SESSION['mensagens_form'][$name]);
}

function inlui_organizacao($id_cadastro,$nome_organizacao,$cidade,$estado,$acao){
    
    $_SESSION['doacao']['acao']=$acao;
    $_SESSION['doacao']['id_cadastro'] = $id_cadastro;
    $_SESSION['doacao']['nome_organizacao']= $nome_organizacao;
    $_SESSION['doacao']['cidade']= $cidade;
    $_SESSION['doacao']['estado']= $estado;
    $_SESSION['doacao']['organizacao_selecionada']=$_SESSION['doacao']['id_cadastro']." - ".$_SESSION['doacao']['nome_organizacao'].
    " - ".$_SESSION['doacao']['cidade']." - ".$_SESSION['doacao']['estado'];

}

function inlui_dados_criança($rg_criança,$nome_criança,$idade,$sexo,
$tipo_kit,$tamanho_calca,$tamanho_camisa,$tamanho_calcado){

    $_SESSION['doacao']['rg_crianca'] = $rg_criança;
    $_SESSION['doacao']['nome_crianca'] = $rg_criança;
    $_SESSION['doacao']['idade'] = $idade;
    $_SESSION['doacao']['sexo'] = $sexo;
    $_SESSION['doacao']['tipo_kit'] = $tipo_kit;
    $_SESSION['doacao']['tamanho_calca'] = $tipo_kit;
    $_SESSION['doacao']['tamanho_camisa'] = $tipo_kit;
    $_SESSION['doacao']['tipo_calcado'] = $tipo_kit;

}
?>