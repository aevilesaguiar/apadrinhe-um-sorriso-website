<?php

//Cadastra dados gerais
function cadastra_dados_gerais($tipo_cadastro,$nome,$telefone,$rede_social,
$email,$numendereco,$logradouro,$cidade,$estado,$cep,$bairro,
$complemento,$fk_user){

    $nivel_acesso=0;
    $id_cadastro = 1;
    $cadastro = 'INSERT INTO perfil(id_cadastro,
        tipo_cadastro,nivel_acesso,status_cadastro,nome,telefone,
        rede_social,e_mail,numendereco,logradouro,cidade,estado,cep,
        bairro,complemento,fk_user) 
    VALUES("'.$id_cadastro.'","'.$tipo_cadastro.'","'.$nivel_acesso.'","EA","'.$nome.'","'.$telefone.'",
    "'.$rede_social.'","'.$email.'","'.$numendereco.'","'.$logradouro.'","'.$cidade.'",
    "'.$estado.'","'.$cep.'","'.$bairro.'","'.$complemento.'","'.$fk_user.'")';

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
    $cadastro = 'INSERT INTO dados_pf(cpf,rg,fk_id_cadastro) 
    VALUES("'.$cpf.'","0000000000","'.$dados_gerais_id.'")';

    return $cadastro;
    
}

//Cadastra Usuário e Senha.
function cadastra_usuario($usuario,$senha){
    $cadastro = 'INSERT INTO usuario(user,senha) VALUES("'.$usuario.'","'.$senha.'")';
    return $cadastro;
}


