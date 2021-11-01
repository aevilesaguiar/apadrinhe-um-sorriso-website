<?php 
 //include 'php/controle-organizacao/conexao-banco-org.php';
 $host = "LOCALHOST"; //Servidor
 $usuario = "root"; //Usuário do Servidor
 $senha = ""; //Senha do servidor
 $banco="doe_um_sorriso"; //Nome do banco

 $conecta = mysqli_connect($host,$usuario,$senha,$banco) or die ("Erro de conexão");

 $id_cadastro_aprovacao = $_GET['codigo']; 

 $search = "UPDATE perfil SET status_cadastro = 'OK' WHERE id_cadastro = '$id_cadastro_aprovacao'";
 $result_search = mysqli_query($conecta, $search);


?>