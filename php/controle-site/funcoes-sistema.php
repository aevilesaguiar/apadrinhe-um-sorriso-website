<?php

function exibe_doacao($nome){
    
    return isset($_SESSION['doacao'][$nome])?$_SESSION['doacao'][$nome]:"";
}

function exibe_doador($nome){
    
    return isset($_SESSION['usuario'][$nome])?$_SESSION['usuario'][$nome]:"";
}

function data_hora(){
    date_default_timezone_set('America/Sao_Paulo');

    return date("Y-m-d H:m:s");
}

function calcula_idade($data_nascimento){

    if($data_nascimento!==""){
    data_hora();
    $data_atual		=	explode("-",date("Y-m-d"));
    $data_nascimento=explode("-",$data_nascimento);

    $ano = $data_atual[0]-$data_nascimento[0];
    $mes = $data_atual[1]-$data_nascimento[1];
    $dia = $data_atual[1]-$data_nascimento[1];

    return $ano." anos";

    }

}

    