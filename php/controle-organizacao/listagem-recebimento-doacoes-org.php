<?php
  include 'php/controle-organizacao/conexao-banco-org.php';
 
  $search = "SELECT a.nome, b.nome_crianca, c.id_doacao
                FROM perfil a
                INNER JOIN realiza d
                ON a.id_cadastro = d.fk_id_cadastro
                INNER JOIN doacao c
                ON c.id_doacao = d.fk_id_doacao
                INNER JOIN dados_crianca b
                ON b.rg_crianca = c.fk_rg_crianca
                
                WHERE c.data_hora_recebimento IS NULL ";
  $result_search = mysqli_query($conecta, $search);

  $search2 = "SELECT a.nome, b.nome_crianca, c.id_doacao
                FROM perfil a
                INNER JOIN realiza d
                ON a.id_cadastro = d.fk_id_cadastro
                INNER JOIN doacao c
                ON c.id_doacao = d.fk_id_doacao
                INNER JOIN dados_crianca b
                ON b.rg_crianca = c.fk_rg_crianca
                
                WHERE c.data_hora_recebimento IS NOT NULL ";
  $result_search2 = mysqli_query($conecta, $search2);


?>