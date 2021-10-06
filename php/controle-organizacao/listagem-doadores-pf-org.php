<?php
  include 'php/controle-organizacao/conexao-banco-org.php';
 
  $search = "SELECT b.cpf, a.nome, a.telefone, a.e_mail, a.status_cadastro, a.id_cadastro 
                FROM perfil a 
                INNER JOIN dados_pf b 
                ON a.id_cadastro = b.fk_id_cadastro 
               
                WHERE a.tipo_cadastro = 'doador_pf' ";
  $result_search = mysqli_query($conecta, $search);
  /*
  */
?>

