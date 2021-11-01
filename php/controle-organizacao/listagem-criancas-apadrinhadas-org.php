<?php
  
 
  $search2 = 'SELECT dc.rg_crianca, dc.nome_crianca, p.nome, p.telefone,p.id_cadastro 
                FROM cadastra c
                INNER JOIN dados_crianca dc
                ON dc.rg_crianca=c.fk_rg_crianca
                INNER JOIN possui_cri pc
                ON pc.fk_rg_crianca=dc.rg_crianca
                INNER JOIN dados_responsavel dr
                ON dr.id_familia=pc.fk_id_familia
                INNER JOIN perfil p
                ON p.id_cadastro=dr.fk_id_cadastro WHERE c.fk_id_cadastro="'.$_SESSION['usuario_org']['id_cadastro'].'" 
                AND dc.rg_crianca IN (SELECT fk_rg_crianca FROM doacao)';
  $result_search2 = mysqli_query($conecta, $search2);

  $search = 'SELECT dc.rg_crianca, dc.nome_crianca, p.nome, p.telefone,p.id_cadastro 
  FROM cadastra c
  INNER JOIN dados_crianca dc
  ON dc.rg_crianca=c.fk_rg_crianca
  INNER JOIN possui_cri pc
  ON pc.fk_rg_crianca=dc.rg_crianca
  INNER JOIN dados_responsavel dr
  ON dr.id_familia=pc.fk_id_familia
  INNER JOIN perfil p
  ON p.id_cadastro=dr.fk_id_cadastro WHERE c.fk_id_cadastro="'.$_SESSION['usuario_org']['id_cadastro'].'" 
  AND dc.rg_crianca NOT IN (SELECT fk_rg_crianca FROM doacao)';
  $result_search = mysqli_query($conecta, $search);


?>

