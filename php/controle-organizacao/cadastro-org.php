<?php

include '../geral/conexao-banco.php';
include "sessao-org.php"; //Inicia sessao e encerra sessões
include "consulta-org.php";
include 'funcoes-cadastro-org.php';

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

    //cadastra usuário
    $cadastra_usuario = $conecta->query(cadastra_usuario($usuario,$senha));

    //cadastra usuário
    $usuario = $_SESSION['usuario']['email'];
    $cnpj_org = $conecta->query(ret_cnjpj_org($usuario,$senha));

    //cadastra colaborador na possui_colab
    $cadastra_possui_colab=mysqli_query($conecta, cadastra_possui_colab($cpf,$cnpj_org,$id_cadastro));

    
}
