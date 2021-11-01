<?php 
 include 'php/controle-organizacao/conexao-banco-org.php';

 $id_cadastro= $_GET['codigo']; 

 $search = "SELECT a.cnpj, a.nome_fantasia, b.e_mail, b.telefone, b.logradouro, 
                    b.numendereco, b.bairro, b.complemento, b.cep, b.cidade, 
                    b.estado, b.rede_social, b.fk_user, b.id_cadastro , a.site
                    FROM dados_pj a 
                    INNER JOIN perfil b 
                    ON b.id_cadastro = a.fk_id_cadastro 

                    WHERE b.tipo_cadastro='doador_pj' AND b.id_cadastro = '$id_cadastro'";
$result_search = mysqli_query($conecta, $search);


?>