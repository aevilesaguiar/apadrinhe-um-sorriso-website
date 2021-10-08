<?php

function altera_dados_gerais($nome,$telefone,$rede_social,
$numendereco,$logradouro,$cidade,$estado,$cep,$bairro,
$complemento,$id_cadastro){

    
    $cadastro = 'UPDATE perfil SET
        nome="'.$nome.'",telefone="'.$telefone.'",
        rede_social="'.$rede_social.'",numendereco="'.$numendereco.'",logradouro="'.$logradouro.'",cidade="'.$cidade.'",
        estado="'.$estado.'",cep="'.$cep.'",
        bairro="'.$bairro.'",complemento="'.$complemento.'" WHERE id_cadastro="'.$id_cadastro.'"';

    return $cadastro;
    
}

//Cadastra pj
function altera_pj($cnpj,$nome_fantasia,$site,$tipo_pj,$fk_id_cadastro){
    $cadastro = 'UPDATE dados_pj SET
    nome_fantasia="'.$nome_fantasia.'",site="'.$site.'",tipo_pj="'.$tipo_pj.'"
    where fk_id_cadastro="'.$fk_id_cadastro.'"';

    return $cadastro;
    
}

//Cadastra pf
function altera_pf($cpf,$dados_gerais_id){
    $cadastro = 'INSERT INTO dados_pf(cpf,rg,fk_id_cadastro) 
    VALUES("'.$cpf.'","0000000000","'.$dados_gerais_id.'")';

    return $cadastro;
    
}

function altera_usuario($usuario,$senha){
    $cadastro = 'UPDATE usuario SET senha="'.$senha.'" WHERE user="'.$usuario.'"';
    return $cadastro;
}