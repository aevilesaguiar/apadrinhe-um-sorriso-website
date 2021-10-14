<?php 
 //include 'php/controle-organizacao/conexao-banco-org.php';
 include '../geral/conexao-banco.php';
 include '../controle-site/redirecionamento-pagina.php';
 include 'sessao-org.php';
 include '../controle-site/mensagens.php';


 if(isset($_GET['btnAprovar'])==1){

 $id_cadastro_aprovacao = $_GET['codigo']; 

 $search = "UPDATE perfil SET status_cadastro = 'OK' WHERE id_cadastro = '$id_cadastro_aprovacao'";
 $result_search = mysqli_query($conecta, $search);

 redireciona_get(16,$id_cadastro_aprovacao);

 sessao_mensagem(mensagem(28));

 }else if(isset($_POST['btnReprovar'])){
    $id_cadastro_aprovacao = $_POST['codigo']; 

    $search = "UPDATE perfil SET status_cadastro = 'RP' WHERE id_cadastro = '$id_cadastro_aprovacao'";
 $result_search = mysqli_query($conecta, $search);

    $search = 'INSERT mensagem_sistema(status_sistema,mensagem) values("PENDENTE","'.$_POST['mensagem'].'")';
 $result_search = mysqli_query($conecta, $search);


 $id_mensagem = mysqli_insert_id($conecta);

 $search = 'INSERT perfil_exibe(fk_id_mensagem,fk_id_cadastro) values("'.$id_mensagem .'","'.$_POST['codigo'].'")';
 $result_search = mysqli_query($conecta, $search);
 
 redireciona_get(16,$id_cadastro_aprovacao);

 sessao_mensagem(mensagem(29));

 }else if($_POST['btnResolvido']){
    $id_cadastro_aprovacao = $_GET['codigo']; 
    $search = 'UPDATE mensagem_sistema SET status_sistema="FINALIZADO" WHERE id_mensagem="'.$_GET['id_mensagem'].'"';
 $result_search = mysqli_query($conecta, $search);
 redireciona_get(17,$id_cadastro_aprovacao);

 sessao_mensagem(mensagem(30));
 }

?>