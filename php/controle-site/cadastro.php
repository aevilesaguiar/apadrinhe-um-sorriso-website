<?php

include '../geral/conexao-banco.php';
include 'funcoes-cadastro.php';
include "redirecionamento-pagina.php"; //Registro de todas as paginas para redirecionamento

$cnpj = $_POST["cnpj"];
$razao_social =$_POST['razao_social'];
$email = $_POST['email'];
$telefone=$_POST['telefone'];
$cep=$_POST['cep'];
$endereco=$_POST['endereco'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$bairro=$_POST['bairro'];
$complemento=$_POST['complemento'];
$site=$_POST['site'];
$redesocial=$_POST['rede_social'];
$tipo_org=$_POST['tipo_organizacao'];
$usuario=$_POST['usuario'];
$senha=$_POST['senha'];
$confirm_senha=$_POST['confirm_senha'];
$obs=$_POST['observacao'];


$cadastra_usuario = $conecta->query(cadastra_usuario($usuario,$senha));//cadastra usuário

$id_usuario=mysqli_insert_id($conecta);// retorna o id_usuario do usuário cadastrado

$cadastra=$conecta->query(cadastra_organizacao($cnpj,$razao_social,$email,
$telefone,$cep,$endereco,$numero,$cidade,$bairro,$complemento,$site,
$redesocial,$tipo_org,$obs,$id_usuario));//cadastra organização

redireciona(3);