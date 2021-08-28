<?php

include '../geral/conexao-banco.php';
include "redirecionamento-pagina.php"; //Registro de todas as paginas para redirecionamento
include "mensagens.php";// Registro de todas mensagens do sistema
include "sessao.php"; //Inicia sessao e encerra sessões
include "consulta.php";
include 'funcoes-cadastro.php';


if(isset($_POST['btnCadastraUsuario'])){

//Dados cadastro-pessoa-fisica diferenciado
if($_POST['tipo_usuario']=="doador_pf"){
    $cpf = $_POST['cpf'];
    $_SESSION['dados_form']['cpf']=$cpf;
    $nome = $_POST['nome'];
    $_SESSION['dados_form']['nome']=$nome;
    
    //Validação cpf
 
    
}


//Dados comum cadastro-organização/cadastro-pessoa-fisica/juridica
$tipo_cadastro=$_POST['tipo_usuario'];//Tipos de usuário : doador_pj/doador_pf/organizacao
$email = $_POST['email'];
$_SESSION['dados_form']['email']=$email;
$telefone=$_POST['telefone'];
$_SESSION['dados_form']['telefone']=$telefone;
$cep=$_POST['cep'];
$_SESSION['dados_form']['cep']=$cep;
$endereco=$_POST['endereco'];
$_SESSION['dados_form']['endereco']=$endereco;
$numero=$_POST['numero'];
$_SESSION['dados_form']['numero']=$numero;
$cidade=$_POST['cidade'];
$_SESSION['dados_form']['cidade']=$cidade;
$estado=$_POST['estado'];
$_SESSION['dados_form']['estado']=$estado;
$bairro=$_POST['bairro'];
$_SESSION['dados_form']['bairro']=$bairro;
$complemento=$_POST['complemento'];
$_SESSION['dados_form']['complemento']=$complemento;
$redesocial=$_POST['rede_social'];
$_SESSION['dados_form']['rede_social']=$redesocial;
    
//Dados comuns para cadastro login
$usuario=$_POST['email'];
$senha=$_POST['senha'];
$confirm_senha=$_POST['confirm_senha'];



//Dados cadastro-organização/pj diferenciado
if($_POST['tipo_usuario']=="organizacao" || $_POST['tipo_usuario']=="doador_pj"){
$cnpj = $_POST["cnpj"];
$_SESSION['dados_form']['cnpj']=$cnpj;
$nome =$_POST['razao_social'];
$_SESSION['dados_form']['razao_social']=$nome;
$site=$_POST['site'];
$_SESSION['dados_form']['site']=$site;
$tipo_pj=$_POST['tipo_organizacao'];;
$_SESSION['dados_form']['tipo_organizacao']=$tipo_pj;
$nome_fantasia=$_POST['nome_fantasia'];
$_SESSION['dados_form']['nome_fantasia']=$nome_fantasia;
if($_POST['tipo_usuario']=="organizacao")
{
$informacoes=$_POST['informacoes'];
$_SESSION['dados_form']['informacoes']=$informacoes;
}else{
$informacoes="";
}
}

valida_cadastro($_POST);

if(!empty($_SESSION['mensagens_form'])){
   
    redireciona(retorna_pagina_cadastro($tipo_cadastro));

}else{

unset($_SESSION['dados_form']);

$cadastra_usuario = $conecta->query(cadastra_usuario($usuario,$senha));//cadastra usuário

$cadastra=$conecta->query(cadastra_dados_gerais($tipo_cadastro,$nome,
$telefone,$redesocial,$email,$numero,$endereco,$cidade,$estado,$cep,$bairro,
$complemento,$usuario));

$id_cadastro = mysqli_insert_id($conecta);//retorna id cadastro


if($_POST['tipo_usuario']=="doador_pf")// Cadastra doador pf
{
    $cadastra_pf=$conecta->query(cadastra_pf($cpf,$id_cadastro));

}else if($_POST['tipo_usuario']=="organizacao" || $_POST['tipo_usuario']=="doador_pj"){

$cadastra_pj=$conecta->query(cadastra_pj($cnpj,$nome_fantasia,$site,$tipo_pj,$id_cadastro));//cadastra organização



}

$documento=mysqli_insert_id($conecta);// retorna documento cadastrado


if(!empty($id_cadastro)){

    sessao_mensagem(mensagem(9));
    redireciona(3);


}else{
    redireciona(retorna_pagina_cadastro($tipo_cadastro));
}

}

}else if(isset($_POST['btnIncluirOrg']) || isset($_POST['btnAlterarOrg']) ){

    isset($_POST['btnIncluirOrg'])?$acao=1:$acao=0;

    $dados_organizacao = explode("-",$_POST['organizacao']);

    inlui_organizacao($dados_organizacao[0],$dados_organizacao[1],$dados_organizacao[2],$dados_organizacao[3],$acao);

    isset($_POST['btnIncluirOrg'])?sessao_mensagem(mensagem(19)):sessao_mensagem(mensagem(20));

    redireciona(9);
}else if(isset($_POST['btnIncluirCriancaKit'])){

    redireciona(9);

}else{
    
    redireciona(8);

}

