<?php

//Cadastra dados gerais
function cadastra_dados_gerais($tipo_cadastro,$nome,$telefone,$rede_social,
$email,$numendereco,$logradouro,$cidade,$estado,$cep,$bairro,
$complemento,$fk_user){

    $nivel_acesso=0;

    $cadastro = 'INSERT INTO perfil(
        tipo_cadastro,nivel_acesso,status_cadastro,nome,telefone,
        rede_social,e_mail,numendereco,logradouro,cidade,estado,cep,
        bairro,complemento,fk_user) 
    VALUES("'.$tipo_cadastro.'","'.$nivel_acesso.'","OK","'.$nome.'","'.$telefone.'",
    "'.$rede_social.'","'.$email.'","'.$numendereco.'","'.$logradouro.'","'.$cidade.'",
    "'.$estado.'","'.$cep.'","'.$bairro.'","'.$complemento.'","'.$fk_user.'")';

    return $cadastro;
    
}

//Cadastra Usuário e Senha.
function cadastra_usuario($usuario,$senha){
    $cadastro = 'INSERT INTO usuario(user,senha) VALUES("'.$usuario.'","'.$senha.'")';
    return $cadastro;
}


function cadastra_possui_colab($cpf,$cnpj,$id_colaborador){
    $cadastro = 'INSERT INTO possui_colab(fk_cpf,fk_cnpj,fk_id_colaborador) VALUES("'.$cpf.'","'.$cnpj.'","'.$id_colaborador.'")';
    return $cadastro;
}


//Cadastra pf
function cadastra_pf($cpf,$dados_gerais_id){
    $cadastro = 'INSERT INTO dados_pf(cpf,rg,fk_id_cadastro) 
    VALUES("'.$cpf.'","0000000000","'.$dados_gerais_id.'")';

    return $cadastro;
    
}



function cadastra_colaborador($funcao, $id_cadastro){
    $cadastro = 'INSERT INTO colaborador(funcao,fk_id_cadastro) 
    VALUES("'.$funcao.'","'.$id_cadastro.'")';
    return $cadastro;
}


function converte_data($data){

    $data = explode("/",$data);

    return $data[2]."-".$data[1]."-".$data[0];

}

function valida_cadastro($nome){

    if($nome['tipo_usuario']=="doador_pf"){
        strlen($nome['cpf'])!==14?mensagens_form(mensagem(10),'cpf'):limpa_mensagens_form('cpf');
    }
    if($nome['tipo_usuario']=="doador_pj" || $nome['tipo_usuario']=="organizacao"){
        strlen($nome['cnpj'])!==18?mensagens_form(mensagem(18),'cnpj'):limpa_mensagens_form('cnpj');
    }

    //Dados comuns
    strlen($nome['numero'])>5?mensagens_form(mensagem(11),'numero'):limpa_mensagens_form('numero');
    strlen($nome['telefone'])>=13?limpa_mensagens_form('telefone'):mensagens_form(mensagem(16),'telefone');
    strlen($nome['senha'])>=6 && strlen($nome['senha'])<=10?limpa_mensagens_form('senha'):mensagens_form(mensagem(13),'senha');
    $nome['senha']!==$nome['confirm_senha']?mensagens_form(mensagem(12),'senha'):"";
    strlen($nome['cep'])==9?limpa_mensagens_form('cep'):mensagens_form(mensagem(14),'cep');
    strlen($nome['complemento'])<=30?limpa_mensagens_form('complemento'):mensagens_form(mensagem(15),'complemento');
    strlen($nome['bairro'])<=30?limpa_mensagens_form('bairro'):mensagens_form(mensagem(15),'bairro');
    strlen($nome['endereco'])<=30?limpa_mensagens_form('logradouro'):mensagens_form(mensagem(15),'endereco');
    strlen($nome['cidade'])<=30?limpa_mensagens_form('cidade'):mensagens_form(mensagem(15),'cidade');
    strlen($nome['rede_social'])<=30?limpa_mensagens_form('rede_social'):mensagens_form(mensagem(15),'rede_social');

}
