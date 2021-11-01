<?php

//include 'php/geral/conexao-banco.php';
//include 'php/controle-site/sessao.php';
//sinclude 'php/controle-site/consulta.php';

include '../geral/conexao-banco.php';
//include "redirecionamento-pagina.php"; //Registro de todas as paginas para redirecionamento
//include "mensagens.php"; // Registro de todas mensagens do sistema
include "sessao-org.php"; //Inicia sessao e encerra sessões
include "consulta-org.php";
include 'funcoes-cadastro-org-colab.php';
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


if(isset($_POST['btnCadastraColaborador'])){

    //cadastra_perfil - perfil
    $tipo_cadastro=$_POST['tipo_usuario'];//Tipos de usuário : colaborador
    $email = $_POST['email'];
    $_SESSION['dados_form']['email']=$email;
    $nome = $_POST['nome'];
    $_SESSION['dados_form']['nome']=$nome;
    $telefone=$_POST['telefone'];
    $_SESSION['dados_form']['telefone']=$telefone;
    $cep=$_POST['cep'];
    $_SESSION['dados_form']['cep']=$cep;
    $endereco=$_POST['numero'];
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


    //$tipo_cadastro ="colaborador";
    //$redesocial = null;
    //$usuario = "colaborador@padrao.com";
    //$status_cadastro = "OK";

if ($tipo_cadastro =="colaborador"){
    $rede_social = null;
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

if(isset($_POST['btnCadastraColaborador'])){
    
    //cadastra usuário
    $cadastra_usuario = $conecta->query(cadastra_usuario($usuario,$senha));

    $cadastra=mysqli_query($conecta, cadastra_dados_gerais($tipo_cadastro,$nome,
    $telefone,$rede_social,$email,$numero,$endereco,$cidade,$estado,$cep,$bairro,
    $complemento,$usuario));

    //retorna id cadastro
    $id_cadastro = mysqli_insert_id($conecta);

    //cadastra mae no banco de dados de pessoa física
    $cadastra_pf=mysqli_query($conecta, cadastra_pf($cpf,$id_cadastro));
}



if(isset($_POST['btnCadastraColaborador'])){

    //cadastra na tabela colaborador
    $cadastra_colaborador=$conecta->query(cadastra_colaborador($funcao,$id_cadastro));

    //retorna id colaborador
    $id_colaborador = mysqli_insert_id($conecta);

    

    /*cadastra usuário*/
    $id_org = $_SESSION['usuario_org']['id_cadastro'];
    $cnpj_org = $conecta->query(ret_cnjpj_org($id_org));
    foreach($cnpj_org as $cnpj){

    }
    //cadastra colaborador na possui_colab
    $cadastra_possui_colab=mysqli_query($conecta, cadastra_possui_colab($cpf,$cnpj['cnpj'],$id_cadastro));
    header("Location:../../cadastro-colaborador-organizacao.php");
    
}



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
