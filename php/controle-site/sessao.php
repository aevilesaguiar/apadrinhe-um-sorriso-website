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
    $_SESSION['doacao']['crianca_selecionada']=$_SESSION['doacao']['rg_crianca']."/".$_SESSION['doacao']['nome_crianca'].
    " - ".$_SESSION['doacao']['idade']."/".$_SESSION['doacao']['sexo']."/".$_SESSION['doacao']['tipo_kit']
    ."/".$_SESSION['doacao']['tamanho_calca']."/".$_SESSION['doacao']['tamanho_camisa']."/".$_SESSION['doacao']['tipo_calcado'];
    $_SESSION['doacao']['crianca_selecionada_exib']=$_SESSION['doacao']['nome_crianca'].
    "-".$_SESSION['doacao']['idade']."-".$_SESSION['doacao']['sexo']
    ;
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
}
?>