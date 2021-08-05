<?php

function cadastra_organizacao($cnpj,$razao_social,$email,$telefone,$cep,$endereco,$numero,
$cidade,$bairro,
$complemento,$site,$redesocial,$tipo_org,$obs,$id_usuario){
    $cadastro = 'INSERT INTO cadastro_org(
        cnpj_org,razao_social_org,email_org,telefone_org,
    cep_org,endereco_org,numero_org,cidade_org,estado_org,
    bairro_org,complemento_org,site_org,
    redesocial_org,tipo_de_org,obs_org,usuarios) 
    VALUES("'.$cnpj.'","'.$razao_social.'","'.$email.'","'.$telefone.'","'.$cep.'","'.$endereco.'",
    "'.$numero.'","'.$cidade.'","1","'.$bairro.'","'.$complemento.'",
    "'.$site.'","'.$redesocial.'","'.$tipo_org.'","'.$obs.'","'.$id_usuario.'")';

    return $cadastro;
    
}//Cadastra organização

function cadastra_usuario($usuario,$senha){
    $cadastro = 'INSERT INTO usuarios(usuario,senha) VALUES("'.$usuario.'","'.$senha.'")';
    return $cadastro;
}//Cadastra Usuário e Senha.