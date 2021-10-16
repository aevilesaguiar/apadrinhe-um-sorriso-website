<?php 
 //include 'php/controle-organizacao/conexao-banco-org.php';
 //include '../geral/conexao-banco.php';

    $host = "LOCALHOST"; //Servidor
    $usuario = "root"; //Usuário do Servidor
    $senha = ""; //Senha do servidor
    $banco="doe_um_sorriso"; //Nome do banco

    $conecta = new mysqli($host,$usuario,$senha,$banco);


 $id_cadastro= $_GET['codigo']; 

 $search = "SELECT a.cpf, b.nome, b.e_mail, b.telefone, b.logradouro, 
                    b.numendereco, b.bairro, b.complemento, b.cep, b.cidade, 
                    b.estado, b.rede_social, b.fk_user, b.id_cadastro 
                    FROM dados_pf a 
                    INNER JOIN perfil b 
                    ON b.id_cadastro = a.fk_id_cadastro 

                    WHERE b.tipo_cadastro='doador_pf' AND b.id_cadastro = '$id_cadastro'";
$result_search = mysqli_query($conecta, $search);
 

?>