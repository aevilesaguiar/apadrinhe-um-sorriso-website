<?php 
 //include 'php/controle-organizacao/conexao-banco-org.php';
 //include '../geral/conexao-banco.php';

    $host = "LOCALHOST"; //Servidor
    $usuario = "root"; //Usuário do Servidor
    $senha = ""; //Senha do servidor
    $banco="doe_um_sorriso"; //Nome do banco

    $conecta = new mysqli($host,$usuario,$senha,$banco);


 $id_cadastro= $_GET['codigo']; 

 $search = "SELECT a.*,b.* 
                    FROM perfil b  
                    INNER JOIN dados_pf a
                    ON a.fk_id_cadastro =b.id_cadastro

                    WHERE b.tipo_cadastro='doador_pf' AND b.id_cadastro = '$id_cadastro'";
$result_search = mysqli_query($conecta, $search);
 

?>