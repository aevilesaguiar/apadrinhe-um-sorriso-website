<?php

//include 'php/geral/conexao-banco.php';
//include 'php/controle-site/sessao.php';
//sinclude 'php/controle-site/consulta.php';

include '../geral/conexao-banco.php';
//include "redirecionamento-pagina.php"; //Registro de todas as paginas para redirecionamento
//include "mensagens.php"; // Registro de todas mensagens do sistema
include "sessao-org.php"; //Inicia sessao e encerra sessões
include "consulta-org.php";
include 'funcoes-cadastro-org.php';
//include 'php/controle-site/valida-entrada-usuario.php';
echo "<pre>";
print_r($_POST);
echo "</pre>";
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

//Upload arquivo
if(isset($_POST['btnCadastraFamilia'])){

    $termo_arq = $_FILES['termo_arq'];

    echo "<pre>";
    print_r($termo_arq);
    echo "</pre>";

    if($termo_arq !==null) {

        preg_match("/\.(pdf|jpeg|png|jpg){1}$/i", $termo_arq["name"], $ext);
        //gera um nome ramdomico para a imagem

            if ($ext == true) {

            $nome_arq = md5(uniqid(time())) . "." . $ext[1];

            $path_arq = "documentos/" . $nome_arq;

            move_uploaded_file($termo_arq["tmp_name"], $path_arq);


        }
    }
}

if(isset($_POST['btnCadastraFamilia']) || isset($_POST['btnCadastraColaborador'])){

    //cadastra_perfil - perfil
    $tipo_cadastro=$_POST['tipo_usuario'];//Tipos de usuário : familia/colaborador
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

}

if(isset($_POST['btnCadastraFamilia'])){

    $nome = $_POST['nome_mae'];
    $_SESSION['dados_form']['nome']=$nome;

    //cadastra_pf - dados_pf
    $cpf = $_POST['cpf_mae'];
    $_SESSION['dados_form']['cpf']=$cpf;

    //cadastra_familia - dados_responsavel
    $cpf_resp = $_POST['cpf_pai'];
    $_SESSION['dados_form']['cpf']=$cpf_resp;
    $nome_resp = $_POST['nome_pai'];
    $_SESSION['dados_form']['nome']=$nome_resp;

    //Dados inclusao criancas dados_crianca
    $rg_crianca=$_POST['rg_crianca'];
    $_SESSION['dados_form']['rg_crianca']=$rg_crianca;
    $nome_crianca=$_POST['nome_crianca'];
    $_SESSION['dados_form']['nome_crianca']=$nome_crianca;
    $sexo=$_POST['sexo'];
    $_SESSION['dados_form']['sexo']=$sexo;
    $nasc_crianca=$_POST['nasc_crianca'];
    $nasc_crianca=converte_data($_POST['nasc_crianca']);
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

}

if ($tipo_cadastro == "familia"){
    $redesocial = null;
    $fk_user = "familia@familia.com";
    $status_cadastro = "OK";
}

if ($tipo_cadastro =="colaborador"){
    $redesocial = null;
    $usuario = "colaborador@padrao.com";
    $status_cadastro = "OK";
}

if(isset($_POST['btnCadastraColaborador'])){

    $cpf = $_POST['cpf_colaborador'];
    $_SESSION['dados_form']['cpf']=$cpf;

    //cadastra_colaborador - colaborador
    $funcao = $_POST['funcao'];
    $_SESSION['dados_form']['funcao']=$funcao;

    //Dados comuns para cadastro login
    $usuario=$_POST['email'];
    $_SESSION['dados_form']['email']=$usuario;
    $senha=$_POST['senha'];
    $_SESSION['dados_form']['senha']=$senha;
    $confirm_senha=$_POST['confirm_senha'];
    $_SESSION['dados_form']['confirm_senha']=$confirm_senha;

}

if(isset($_POST['btnCadastraFamilia']) || isset($_POST['btnCadastraColaborador'])){

    $cadastra=mysqli_query($conecta, cadastra_dados_gerais($tipo_cadastro,$nome,
    $telefone,$redesocial,$email,$numero,$endereco,$cidade,$estado,$cep,$bairro,
    $complemento,$fk_user));

    //retorna id cadastro
    $id_cadastro = mysqli_insert_id($conecta);

    //cadastra mae no banco de dados de pessoa física
    $cadastra_pf=mysqli_query($conecta, cadastra_pf($cpf,$id_cadastro));
}

if(isset($_POST['btnCadastraFamilia'])){
    //cadastro no banco de dados de responsavel
    $cadastra_resp=mysqli_query($conecta, cadastra_resp($cpf_resp,$nome_resp,$id_cadastro));

    //retorna id familia
    $id_cadastro_familia = mysqli_insert_id($conecta);

    $nome_arq=explode("/",$path_arq);
    //cadastra no banco dados da crianca
    $cadastra_crianca=$conecta->query(cadastra_crianca($rg_crianca,$nome_crianca,$sexo,$nasc_crianca,$tamanho_camiseta,$tamanho_sapato,$tamanho_calca
    ,$sug_presente,$nome_arq[1],$observacao));

    //cadastra na tabela possui cri
    $cadastra_possui_crianca=mysqli_query($conecta, possui_crianca($rg_crianca,$id_cadastro_familia));

    //cadastra id_organizacao e rg_crianca
    $cadastra_cadastra = $conecta->query(cadastra($rg_crianca,$_SESSION['usuario_org']['id_cadastro']));

    header("Location:../../cadastro-familia.php");
}


if(isset($_POST['btnCadastraColaborador'])){

    //cadastra na tabela colaborador
    $cadastra_colaborador=$conecta->query(cadastra_colaborador($funcao,$id_cadastro));

    //retorna id colaborador
    $id_colaborador = mysqli_insert_id($conecta);

    //cadastra usuário
    $cadastra_usuario = $conecta->query(cadastra_usuario($usuario,$senha));

    //cadastra usuário
    $usuario = $_SESSION['usuario']['email'];
    $cnpj_org = $conecta->query(ret_cnjpj_org($usuario,$senha));

    //cadastra colaborador na possui_colab
    $cadastra_possui_colab=mysqli_query($conecta, cadastra_possui_colab($cpf,$cnpj_org,$id_colaborador));

    
}





  

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



//cadastra no banco dados da crianca
//$cadastra_crianca_doacao=$conecta->query(doacao_inicial($rg_crianca));





/*
if ($cadastra && $cadastra_pf && $cadastra_resp && $cadastra_crianca) {

    echo 'cadastro realizado com sucesso';
} else {
    echo 'cadastro não realizado';
    echo "<br>".$nasc_crianca."<br>";
    echo $rg_crianca."<br>";
    echo $sexo."<br>";
    echo $nome_crianca."<br>";
    echo $tamanho_camiseta."<br>";
    echo $tamanho_sapato."<br>";
    echo $tamanho_calca."<br>";
    echo $sug_presente."<br>";
    echo $observacao."<br>";
}
*/
/*
if ($cadastra_crianca) {

    echo 'crianca cadastrada com sucesso'."<br>";
} else {
    echo 'crianca deu ruim de novo'."<br>";
    echo "<br>".$nasc_crianca."<br>";
    echo $rg_crianca."<br>";
    echo $sexo."<br>";
    echo $nome_crianca."<br>";
    echo $tamanho_camiseta."<br>";
    echo $tamanho_sapato."<br>";
    echo $tamanho_calca."<br>";
    echo $sug_presente."<br>";
    echo $observacao."<br>";
}
*/

if ($cadastra) {

    echo 'cadastro perfil com sucesso'."<br>"."<br>";
} else {
    echo 'cadastro perfil deu ruim de novo'."<br>";
    echo $nome."<br>";
    echo $telefone."<br>";
    echo $rede_social."<br>";
    echo $email."<br>";
    echo $numero."<br>";
    echo $endereco."<br>";
    echo $usuario."<br>";
    echo $tipo_cadastro."<br>";
}

if ($cadastra_pf) {

    echo 'pf cadastrada com sucesso'."<br>"."<br>";
} else {
    echo 'pf deu ruim de novo'."<br>";
}
/*
if ($cadastra_resp) {

    echo 'resp cadastrada com sucesso'."<br>"."<br>";
} else {
    echo 'resp deu ruim de novo'."<br>";
}

/*
if ($cadastra_crianca_doacao) {

    echo 'doacao cadastrada com sucesso'."<br>"."<br>";
} else {
    echo 'doacao deu ruim de novo'."<br>";
}
*/
/*
if ($cadastra_possui_crianca) {

    echo 'possui cadastrada com sucesso'."<br>"."<br>";
} else {
    echo 'possui deu ruim de novo'."<br>";
    echo $rg_crianca."<br>";
    echo $id_cadastro."<br>";
}
*/


/*if ($cadastra_colaborador) {

    echo 'colaborador cadastrado com sucesso'."<br>"."<br>";
} else {
    echo 'colab deu ruim de novo'."<br>";
    echo $id_cadastro."<br>";
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
