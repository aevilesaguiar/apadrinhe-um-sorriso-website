<?php

include '../geral/conexao-banco.php';
include "redirecionamento-pagina.php"; //Registro de todas as paginas para redirecionamento
include "mensagens.php";// Registro de todas mensagens do sistema
include "sessao.php"; //Inicia sessao e encerra sessões
include "consulta.php";
include 'funcoes-sistema.php';
include 'funcoes-cadastro.php';
include 'funcoes-alteracao.php';


if(isset($_POST['btnCadastraUsuario']) || isset($_POST['btnEditCadastraUsuario'])){

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

    valida_cadastro($_POST,"formulario_cadastro");
    if(!empty($_SESSION['mensagens_form'])){
        if(isset($_POST['btnCadastraUsuario'])){
            redireciona(retorna_pagina_cadastro($tipo_cadastro,'cadastro'));
        }elseif(isset($_POST['btnEditCadastraUsuario'])){
            redireciona(retorna_pagina_cadastro($tipo_cadastro,'alteracao'));
            unset($_SESSION['mensagem']);
        }
       
    }

}



if(isset($_POST['btnCadastraUsuario']) && empty($_SESSION['mensagens_form'])){

unset($_SESSION['dados_form']);

$cadastra_usuario = $conecta->query(cadastra_usuario($usuario,$senha));//cadastra usuário

$cadastra=$conecta->query(cadastra_dados_gerais($tipo_cadastro,$nome,
$telefone,$redesocial,$email,$numero,$endereco,$cidade,$estado,$cep,$bairro,
$complemento,$usuario));

$id_cadastro = mysqli_insert_id($conecta);//retorna id cadastro


if(isset($_POST['btnCadastraUsuario']) && $_POST['tipo_usuario']=="doador_pf")// Cadastra doador pf
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
    redireciona(retorna_pagina_cadastro($tipo_cadastro,"cadastro"));
}

}else if(isset($_POST['btnIncluirOrg']) || isset($_POST['btnAlterarOrg']) ){

    if($_POST['organizacao']== 0){
        
        sessao_mensagem(mensagem(23));
        redireciona(9);

    }else{

    isset($_POST['btnIncluirOrg'])?$acao=1:$acao=0;

    $dados_organizacao = explode("-",$_POST['organizacao']);

    limpa_dados_criança();

    inlui_organizacao($dados_organizacao[0],$dados_organizacao[1],$dados_organizacao[2],$dados_organizacao[3],$dados_organizacao[4],$dados_organizacao[5],$dados_organizacao[6],$dados_organizacao[7],$dados_organizacao[8],$dados_organizacao[9],$acao);

    isset($_POST['btnIncluirOrg'])?sessao_mensagem(mensagem(19)):sessao_mensagem(mensagem(20));

    redireciona(9);

    }
}else if(isset($_POST['btnIncluirCriancaKit']) || isset($_POST['btnAlterarCriancaKit']) ){

    if($_POST['dados_crianca']== "selecionar" || $_POST['tipo_kit']=="selecionar"){
        sessao_mensagem(mensagem(24));
        redireciona(9);

    }else{
    
    isset($_POST['btnIncluirCriancaKit'])?$acao=1:$acao=0;

    echo $_POST['tipo_kit'];

    $dados_crianca = explode("/",$_POST['dados_crianca']);

    inlui_dados_criança($dados_crianca[0],$dados_crianca[1],$dados_crianca[2],$dados_crianca[3],$_POST['tipo_kit'],$dados_crianca[4],$dados_crianca[5],$dados_crianca[6],$acao,$dados_crianca[7]);
    isset($_POST['btnIncluirCriancaKit'])?sessao_mensagem(mensagem(21)):sessao_mensagem(mensagem(22));
    
    redireciona(9);

    }
}else if(isset($_GET['Confirmar'])==1){

    if(isset($_SESSION['doacao']['id_cadastro']) && 
    isset($_SESSION['doacao']['rg_crianca']) || isset($_SESSION['doacao']['tipo_kit '])){
            redireciona(11);
        }else{
            
            redireciona(9);
        }

}else if(isset($_GET['btnDoar'])){
    
    if($_GET['btnDoar']==1){
    
    $resultado = $conecta->query(cadastra_doacao());

    $id_doacao=mysqli_insert_id($conecta);

    $resultado = $conecta->query(cadastra_doador($id_doacao,exibe_doador('id_cadastro')));
    
    $resultado = $conecta->query(cadastra_gerenciador_doacao($id_doacao,exibe_doacao('id_cadastro')));

    limpa_dados_doacao();
    limpa_dados_criança();

    $_SESSION['usuario']['id_doacao'] = $id_doacao;
    redireciona(10);
    
    }

}else if($_POST['btnEditCadastraUsuario'] && $_POST['tipo_usuario']=="doador_pf" && empty($_SESSION['mensagens_form'])){

    echo $nome."</br>";
    unset($_SESSION['dados_form']);
    $cadastra_usuario = $conecta->query(altera_usuario($usuario,$senha));//Altera usuário
    $cadastra=$conecta->query(altera_dados_gerais($nome,$telefone,$redesocial,$numero,$endereco,$cidade,$estado,$cep,$bairro,
    $complemento,$_SESSION['usuario']['id_cadastro']));
    redireciona(12);
    sessao_mensagem(mensagem(25));
}else if($_POST['btnEnviarmensagem']){
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $telefone=$_POST['telefone'];
    $mensagem=$_POST['mensagem'];
    $_SESSION['dados_form']['nome']= $nome;
    $_SESSION['dados_form']['email']=$email;
    $_SESSION['dados_form']['telefone']=$telefone;
    $_SESSION['dados_form']['mensagem']=$mensagem;

    valida_cadastro($_POST,"formulario_fale_conosco");

    if(empty($_SESSION['mensagens_form'])){

    $cadastra_fale_conosco=$conecta->query(cadastra_fale_conosco($nome,$email,$telefone,$mensagem));
    redireciona(13);
    sessao_mensagem(mensagem(26));
    unset($_SESSION['dados_form']);

    }else{
        unset($_SESSION['mensagem']);
        redireciona(13);
    }
}else if($_POST['btnEditCadastraUsuario'] && $_POST['tipo_usuario']=="doador_pj"){
    echo $nome."</br>";
    unset($_SESSION['dados_form']);
    $cadastra=$conecta->query(altera_dados_gerais($nome,$telefone,$redesocial,$numero,$endereco,$cidade,$estado,$cep,$bairro,
    $complemento,$_SESSION['usuario']['id_cadastro']));
    $alteracaopj= $conecta->query(altera_pj($cnpj,$nome_fantasia,$site,$tipo_pj,$_SESSION['usuario']['id_cadastro']));
    redireciona(14);
    sessao_mensagem(mensagem(25));
}else if($_POST['btnCadastrarEmail']){
    unset($_SESSION['mensagem']);
    valida_cadastro($_POST,"formulario_cadastrar_email");
    if(empty($_SESSION['mensagens_form'])){
        unset($_SESSION['dados_form']);
        $cadastra_email=$conecta->query(cadastra_email($_POST['email']));
        redireciona(15);
        sessao_mensagem(mensagem(27));
    }else{
        redireciona(15);
    }

}