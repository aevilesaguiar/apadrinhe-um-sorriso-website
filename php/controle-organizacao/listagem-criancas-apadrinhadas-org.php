<?php
  include 'php/controle-organizacao/conexao-banco-org.php';
 
  $search2 = "SELECT d.rg_crianca, d.nome_crianca, a.nome, a.telefone 
                FROM perfil a 
                INNER JOIN dados_responsavel b 
                ON a.id_cadastro = b.fk_id_cadastro 
                INNER JOIN possui_cri c 
                ON b.id_familia = c.fk_id_familia
                INNER JOIN dados_crianca d 
                ON d.rg_crianca = c.fk_rg_crianca
                INNER JOIN doacao e 
                ON d.rg_crianca = e.fk_rg_crianca";
  $result_search2 = mysqli_query($conecta, $search2);

  $search = "SELECT d.rg_crianca, d.nome_crianca, a.nome, a.telefone 
                FROM perfil a 
                INNER JOIN dados_responsavel b 
                ON a.id_cadastro = b.fk_id_cadastro 
                INNER JOIN possui_cri c 
                ON b.id_familia = c.fk_id_familia
                INNER JOIN dados_crianca d 
                ON d.rg_crianca = c.fk_rg_crianca
                
                WHERE d.rg_crianca NOT IN (SELECT fk_rg_crianca FROM doacao)";
  $result_search = mysqli_query($conecta, $search);


?>

