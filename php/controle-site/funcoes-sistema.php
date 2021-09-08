<?php

function exibe_doacao($nome){
    
    return isset($_SESSION['doacao'][$nome])?$_SESSION['doacao'][$nome]:"";
}

function calcula_idade($data_nascimento){

    if($data_nascimento!==""){
    date_default_timezone_set('America/Sao_Paulo');
    $data_atual		=	explode("-",date("Y-m-d"));
    $data_nascimento=explode("-",$data_nascimento);

    $ano = $data_atual[0]-$data_nascimento[0];
    $mes = $data_atual[1]-$data_nascimento[1];
    $dia = $data_atual[1]-$data_nascimento[1];

    return $ano." anos";

    }

}

    