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

    //Validação cpf
    strlen($_POST['cpf'])!==14?mensagens_form(mensagem(10),'cpf'):limpa_mensagens_form('cpf');
    
}


//Dados comum cadastro-organização/cadastro-pessoa-fisica/juridica
$tipo_cadastro=$_POST['tipo_usuario'];//Tipos de usuário : doador_pj/doador_pf/organizacao
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

!is_numeric($numero)?mensagens_form(mensagem(11),'numero'):limpa_mensagens_form('numero');

//Dados cadastro-organização/pj diferenciado
if($_POST['tipo_usuario']=="organizacao" || $_POST['tipo_usuario']=="doador_pj"){
$cnpj = $_POST["cnpj"];
$nome =$_POST['razao_social'];
$site=$_POST['site'];
$tipo_pj="segmento";
$nome_fantasia=$_POST['razao_social'];
if($_POST['tipo_usuario']=="organizacao")
{
$informacoes=$_POST['informacoes'];
}else{
$informacoes="";
}
}

if(count($_SESSION['mensagem_form']>0)){

    redireciona(5);

}else{
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
   redireciona(5);
}

}