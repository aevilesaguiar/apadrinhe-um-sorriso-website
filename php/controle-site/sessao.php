<?php
session_start();

function sessao_login($nome,$email,$telefone,$id_cadastro){ //Inicia sessão de login

    unset($_SESSION['mensagem']);

    $_SESSION['usuario']['id_cadastro']=$id_cadastro;
    $_SESSION['usuario']['usuario'] = $nome;
    $_SESSION['usuario']['nome'] = $nome;
    $_SESSION['usuario']['email'] = $email;
    $_SESSION['usuario']['telefone'] = $telefone;
    $_SESSION['usuario']['logado'] = true;

}

function encerra_sessao(){//Encerra sessão de login

    unset($_SESSION['usuario']['id_cadastro']);
    unset($_SESSION['usuario']['usuario']);
    unset($_SESSION['usuario']['nome']);
    unset($_SESSION['usuario']['email']);
    unset($_SESSION['usuario']['telefone']);
    
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

function inlui_organizacao($id_cadastro,$nome_organizacao,$logradouro,$numero,$cidade,$estado,$cep,$cep1,$tel,$tel1,$acao){
    
    $_SESSION['doacao']['acao']=$acao;
    $_SESSION['doacao']['id_cadastro'] =$id_cadastro;
    $_SESSION['doacao']['nome_organizacao']= $nome_organizacao;
    $_SESSION['doacao']['endereco']= $logradouro;
    $_SESSION['doacao']['numero']= $numero;
    $_SESSION['doacao']['cidade']= $cidade;
    $_SESSION['doacao']['estado']= $estado;
    $_SESSION['doacao']['cep']= $cep."-".$cep1;
    $_SESSION['doacao']['telefone']= $tel."-".$tel1;
    $_SESSION['doacao']['organizacao_selecionada']=$_SESSION['doacao']['id_cadastro']." - ".$_SESSION['doacao']['nome_organizacao'].
    " - ".$_SESSION['doacao']['endereco']."-".$_SESSION['doacao']['numero']."-".$_SESSION['doacao']['cidade']." - ".$_SESSION['doacao']['estado'];

}

function inlui_dados_criança($rg_criança,$nome_criança,$idade,$sexo,
$tipo_kit,$tamanho_calca,$tamanho_camisa,$tamanho_calcado,$acao){

    $_SESSION['doacao']['rg_crianca'] = $rg_criança;
    $_SESSION['doacao']['nome_crianca'] = $nome_criança;
    $_SESSION['doacao']['idade'] = $idade;
    $_SESSION['doacao']['sexo'] = $sexo;
    $_SESSION['doacao']['tipo_kit'] = $tipo_kit;
    $_SESSION['doacao']['tamanho_calca'] = $tamanho_calca;
    $_SESSION['doacao']['tamanho_camisa'] = $tamanho_camisa;
    $_SESSION['doacao']['tipo_calcado'] = $tamanho_calcado;
    $_SESSION['doacao']['acaocriancakit']=$acao;
    $_SESSION['doacao']['status']='true';

    return $_SESSION['doacao']['rg_crianca']."".$_SESSION['doacao']['nome_crianca']."/".
    $_SESSION['doacao']['idade']."/".
    $_SESSION['doacao']['sexo']."/".
    $_SESSION['doacao']['tamanho_calca']."/".
    $_SESSION['doacao']['tamanho_camisa']."/".
    $_SESSION['doacao']['tipo_calcado'];
    
}

function dados_crianca(){

    return $_SESSION['doacao']['rg_crianca']."/".$_SESSION['doacao']['nome_crianca']."/".
    $_SESSION['doacao']['idade']."/".
    $_SESSION['doacao']['sexo']."/".
    $_SESSION['doacao']['tamanho_calca']."/".
    $_SESSION['doacao']['tamanho_camisa']."/".
    $_SESSION['doacao']['tipo_calcado'];
    
}

function dados_crianca_lista(){

    return $_SESSION['doacao']['nome_crianca']."-".
    $_SESSION['doacao']['idade']."-".
    $_SESSION['doacao']['sexo'];
    
}

function limpa_dados_criança(){

    unset($_SESSION['doacao']['rg_crianca']);
    unset($_SESSION['doacao']['nome_crianca']);
    unset($_SESSION['doacao']['idade']);
    unset($_SESSION['doacao']['sexo']);
    unset($_SESSION['doacao']['tipo_kit']);
    unset($_SESSION['doacao']['tamanho_calca']);
    unset($_SESSION['doacao']['tamanho_camisa']);
    unset($_SESSION['doacao']['tipo_calcado']);
    unset($_SESSION['doacao']['acaocriancakit']);
    unset($_SESSION['doacao']['crianca_selecionada']);
    unset($_SESSION['doacao']['crianca_selecionada_exib']);
    unset($_SESSION['doacao']['status']);
}

function limpa_dados_doacao(){
    unset($_SESSION['doacao']['acao']);
    unset($_SESSION['doacao']['id_cadastro']);
    unset($_SESSION['doacao']['nome_organizacao']);
    unset($_SESSION['doacao']['endereco']);
    unset($_SESSION['doacao']['numero']);
    unset($_SESSION['doacao']['cidade']);
    unset($_SESSION['doacao']['estado']);
    unset($_SESSION['doacao']['cep']);
    unset($_SESSION['doacao']['telefone']);
    unset($_SESSION['doacao']['organizacao_selecionada']);
    unset($_SESSION['mensagem']);
}