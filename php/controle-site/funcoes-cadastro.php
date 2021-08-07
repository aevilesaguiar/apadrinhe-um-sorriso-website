<?php

//Cadastra dados gerais
function cadastra_dados_gerais($nome,$email,$telefone,$cep,$endereco,$numero,
$cidade,$bairro,$estado,$complemento,$redesocial){
    $cadastro = 'INSERT INTO dados_gerais(
        nome,email,telefone,cep,endereco,numero,cidade,estado,
    bairro,complemento,redesocial) 
    VALUES("'.$nome.'","'.$email.'","'.$telefone.'","'.$cep.'","'.$endereco.'",
    "'.$numero.'","'.$cidade.'","'.$bairro.'","'.$estado.'","'.$complemento.'",
    "'.$redesocial.'")';

    return $cadastro;
    
}

//Cadastra pj
function cadastra_pj($cnpj,$dados_gerais_id,$razao_social,$site,$tipo_org,$informacoes){
    $cadastro = 'INSERT INTO dados_pj(
        cnpj,dados_gerais_id,razao_social,sites,tipo_org,
    informacoes) 
    VALUES("'.$cnpj.'","'.$dados_gerais_id.'","'.$razao_social.'","'.$site.'","'.$tipo_org.'","'.$informacoes.'")';

    return $cadastro;
    
}


//Cadastra pf
function cadastra_pf($cpf,$dados_gerais_id){
    $cadastro = 'INSERT INTO dados_pf(cpf,dados_gerais_id) 
    VALUES("'.$cpf.'","'.$dados_gerais_id.'")';

    return $cadastro;
    
}

//Cadastra Usuário e Senha.
function cadastra_usuario($usuario,$senha){
    $cadastro = 'INSERT INTO usuario(usuario,senha) VALUES("'.$usuario.'","'.$senha.'")';
    return $cadastro;
}

//Cadastra perfil
function cadastra_perfil($id_usuario,$dados_gerais_id,$tipo_cadastro,$nivel_acesso){
    $cadastro = 'INSERT INTO perfil(usuario_idusuario,dados_gerais_id,tipo_cadastro,nivel_acesso) VALUES("'.$id_usuario.'",
    "'.$dados_gerais_id.'","'.$tipo_cadastro.'","'.$nivel_acesso.'")';
    return $cadastro;
}

