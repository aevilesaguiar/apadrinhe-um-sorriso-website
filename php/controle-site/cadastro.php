<?php

include '../geral/conexao-banco.php';
include 'funcoes-cadastro.php';
include "redirecionamento-pagina.php"; //Registro de todas as paginas para redirecionamento
include "mensagens.php";// Registro de todas mensagens do sistema
include "sessao.php"; //Inicia sessao e encerra sessões

//Dados cadastro-pessoa-fisica diferenciado
if($_POST['tipo_usuario']=="doador_pf"){
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
}
//Dados comum cadastro-organização/cadastro-pessoa-fisica
$email = $_POST['email'];
$telefone=$_POST['telefone'];
$cep=$_POST['cep'];
$endereco=$_POST['endereco'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$bairro=$_POST['bairro'];
$complemento=$_POST['complemento'];
$redesocial=$_POST['rede_social'];
    
//Dados comuns para cadastro login
$usuario=$_POST['email'];
$senha=$_POST['senha'];
$confirm_senha=$_POST['confirm_senha'];

//Dados cadastro-organização/pj diferenciado
if($_POST['tipo_usuario']=="organizacao" || $_POST['tipo_usuario']=="doador_pj"){
$cnpj = $_POST["cnpj"];
$razao_social =$_POST['razao_social'];
$site=$_POST['site'];
$tipo_org="segmento";
$nome=$_POST['razao_social'];
if($_POST['tipo_usuario']=="organizacao")
{
$informacoes=$_POST['informacoes'];
}else{
$informacoes="";
}
}

$cadastra=$conecta->query(cadastra_dados_gerais($nome,$email,
$telefone,$cep,$endereco,$numero,$cidade,$estado,$bairro,$complemento,
$redesocial));//cadastra pj

$dados_gerais_id = mysqli_insert_id($conecta);//retorna id dados gerais


// Cadastra organização ou doador pj
if($_POST['tipo_usuario']=="organizacao" || $_POST['tipo_usuario']=="doador_pj"){

$cadastra_pj=$conecta->query(cadastra_pj($cnpj,$dados_gerais_id,$razao_social,$site,$tipo_org,$informacoes));//cadastra organização



}else if($_POST['tipo_usuario']=="doador_pf")// Cadastra doador pf
{
    $cadastra_pf=$conecta->query(cadastra_pf($cpf,$dados_gerais_id));

}

$documento=mysqli_insert_id($conecta);// retorna documento cadastrado

$cadastra_usuario = $conecta->query(cadastra_usuario($usuario,$senha));//cadastra usuário

$id_usuario=mysqli_insert_id($conecta);// retorna o id_usuario do usuário cadastrado


$tipo_cadastro=$_POST['tipo_usuario'];// Tipo de usuário organizacao, doador_pf e doador_pj

$cadastra_perfil = $conecta->query(cadastra_perfil($id_usuario,$dados_gerais_id,$tipo_cadastro,1));

$id_perfil = mysqli_insert_id($conecta); //retorna id perfil

if(isset($dados_gerais_id) && isset($documento) && isset($documento) && isset($id_perfil)){

    sessao_mensagem(mensagem(9));
    redireciona(3);


}else{
    redireciona(5);
}