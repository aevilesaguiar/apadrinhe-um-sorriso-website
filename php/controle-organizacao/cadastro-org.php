<?php

include 'conexao-banco-org.php';
//include "redirecionamento-pagina.php"; //Registro de todas as paginas para redirecionamento
//include "mensagens.php"; // Registro de todas mensagens do sistema
include "sessao-org.php"; //Inicia sessao e encerra sessões
//include "consulta.php";
include 'funcoes-cadastro-org.php';

/*
if(isset($_POST['btnCadastraFamilia'])){

//Dados cadastro-pessoa-fisica diferenciado
if($_POST['tipo_usuario']=="doador_pf"){
    $cpf = $_POST['cpf'];
    $_SESSION['dados_form']['cpf']=$cpf;
    $nome = $_POST['nome'];
    $_SESSION['dados_form']['nome']=$nome;
    
    //Validação cpf     
}
*/







//Dados comum cadastro-familia
/*
$tipo_cadastro=$_POST['tipo_usuario'];//Tipos de usuário : doador_pj/doador_pf/organizacao
*/
//cadastra_pf - dados_pf
$cpf = $_POST['cpf_mae'];
$_SESSION['dados_form']['cpf']=$cpf;


//cadastra_familia - dados_responsavel
$cpf_resp = $_POST['cpf_pai'];
$_SESSION['dados_form']['cpf']=$cpf_resp;
$nome_resp = $_POST['nome_pai'];
$_SESSION['dados_form']['nome']=$nome_resp;


//cadastra_perfil - perfil
$tipo_cadastro=$_POST['tipo_usuario'];//Tipos de usuário : familia
$nome = $_POST['nome_mae'];
$_SESSION['dados_form']['nome']=$nome;
$email = $_POST['email'];
$_SESSION['dados_form']['email']=$email;
$telefone=$_POST['telefone'];
$_SESSION['dados_form']['telefone']=$telefone;
$cep=$_POST['cep'];
$_SESSION['dados_form']['cep']=$cep;
$endereco=$_POST['rua'];
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


/*
$redesocial=$_POST['rede_social'];
$_SESSION['dados_form']['rede_social']=$redesocial;
*/

/*
//Dados comuns para cadastro login
$usuario=$_POST['email'];
$senha=$_POST['senha'];
$confirm_senha=$_POST['confirm_senha'];
*/

//Dados inclusao criancas dados_crianca
/*
$rg_crianca=$_POST['rg_crianca'];
$_SESSION['dados_form']['rg_crianca']=$rg_crianca;
$nome_crianca=$_POST['nome_crianca'];
$_SESSION['dados_form']['nome_crianca']=$nome_crianca;
$sexo=$_POST['sexo'];
$_SESSION['dados_form']['sexo']=$sexo;
//$nasc_crianca=$_POST['nasc_crianca'];
//$_SESSION['dados_form']['nasc_crianca']=$nasc_crianca;
$tamanho_camiseta=$_POST['tamanho_camiseta'];
$_SESSION['dados_form']['tamanho_camiseta']=$tamanho_camiseta;
$tamanho_sapato=$_POST['tamanho_sapato'];
$_SESSION['dados_form']['tamanho_sapato']=$tamanho_sapato;
$tamanho_calca=$_POST['tamanho_calca'];
$_SESSION['dados_form']['tamanho_calca']=$tamanho_calca;
$sug_presente=$_POST['sug_presente'];
$_SESSION['dados_form']['sug_presente']=$sug_presente;
$observacao=$_POST['observacao'];
$_SESSION['dados_form']['observacao']=$observacao;
*/

if ($tipo_cadastro = "familia"){
    $redesocial = null;
    $usuario = "familia@padrao.com";
    //$status_cadastro = "OK";
    $nasc_crianca='1993-04-21';
    $rg_crianca="58.656.656-0";
    $sexo="F";
    $nome_crianca="Pamela";
    $tamanho_camiseta="P";
    $tamanho_sapato="14";
    $tamanho_calca="P";
    $sug_presente="sugestao";
    $observacao="observacao";
}

//Upload arquivo

$termo_arq = $_FILES['termo_arq'];

if($termo_arq !==null) {

preg_match("/\.(pdf|jpeg|png|jpg){1}$/i", $termo_arq["name"], $ext);
//gera um nome ramdomico para a imagem

if ($ext == true) {

$nome_arq = md5(uniqid(time())) . "." . $ext[1];

$path_arq = "documentos/" . $nome_arq;

move_uploaded_file($termo_arq["tmp_name"], $path_arq);


}
}


//arquivo
/*
$termo_arq=$_POST['termo_arq'];
$_SESSION['dados_form']['termo_arq']=$termo_arq;
$nome_arq=$_POST['nome_arq'];
$_SESSION['dados_form']['nome_arq']=$nome_arq;
$tipo_arq=$_POST['tipo_arq'];
$_SESSION['dados_form']['tipo_arq']=$tipo_arq;
$tamanho_arq=$_POST['tamanho_arq'];
$_SESSION['dados_form']['tamanho_arq']=$tamanho_arq;
$observacao=$_POST['observacao'];
$_SESSION['dados_form']['observacao']=$observacao;


echo $tipo_cadastro. PHP_EOL ;
echo $cpf_resp. PHP_EOL ;
echo $tamanho_calca. PHP_EOL ;
echo $termo_arq. PHP_EOL ;
echo $nome_arq. PHP_EOL ;
echo $tipo_arq. PHP_EOL ;
echo $tamanho_arq. PHP_EOL ;
echo $observacao. PHP_EOL ;
*/

/*
//Upload do arquivo no banco de dados
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
 
$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);


if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}


include 'library/config.php';
include 'library/opendb.php';
 
$query = "INSERT INTO upload (nome, tipo, tamanho, conteudo ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";
 
mysql_query($query) or die('Error, query failed');
include 'library/closedb.php';
 
echo "<br>File $fileName uploaded<br>";
}
*/ 

/*
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
*/


/*
valida_cadastro($_POST);

if(!empty($_SESSION['mensagens_form'])){
   
    redireciona(retorna_pagina_cadastro($tipo_cadastro));

}else{

unset($_SESSION['dados_form']);
*/

//$cadastra_usuario = $conecta->query(cadastra_usuario($usuario,$senha));//cadastra usuário

//cadastra os dados gerais da familia no banco de dados
$cadastra=mysqli_query($conecta, cadastra_dados_gerais($tipo_cadastro,$nome,
$telefone,$redesocial,$email,$numero,$endereco,$cidade,$estado,$cep,$bairro,
$complemento,$usuario));

//retorna id cadastro
$id_cadastro = mysqli_insert_id($conecta);

//cadastra mae no banco de dados de pessoa física
$cadastra_pf=mysqli_query($conecta, cadastra_pf($cpf,$id_cadastro));

//cadastro no banco de dados de responsavel
$cadastra_resp=mysqli_query($conecta, cadastra_resp($cpf_resp,$nome_resp,$cpf,$id_cadastro));

//cadastra no banco dados da crianca
$cadastra_crianca=mysqli_query($conecta, cadastra_crianca($rg_crianca,$nome_crianca,
$sexo,$nasc_crianca,$tamanho_camiseta,$tamanho_sapato,$tamanho_calca,$nome_arq,$sug_presente,$observacao));


if ($cadastra && $cadastra_pf && $cadastra_resp && $cadastra_crianca) {

    echo 'cadastro realizado com sucesso';
} else {
    echo 'cadastro não realizado';
    echo $nasc_crianca;
    echo $rg_crianca;
    echo $sexo;
    echo $nome_crianca;
    echo $tamanho_camiseta;
    echo $tamanho_sapato;
    echo $tamanho_calca;
    echo $sug_presente;
    echo $observacao;
}

if ($cadastra_crianca) {

    echo 'crianca cadastrada com sucesso';
} else {
    echo 'deu ruim de novo';
}

//echo $id_cadastro;


/*
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
*/
