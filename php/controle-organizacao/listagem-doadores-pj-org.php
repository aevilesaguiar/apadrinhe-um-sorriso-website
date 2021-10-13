<?php

 
  function consulta_doadores_pj($id_cadastro){
  $search = 'SELECT g.*,r.*,p.*,dp.* FROM 
                      gerencia g 
                      INNER JOIN realiza r on g.fk_id_doacao=r.fk_id_doacao
                      INNER JOIN perfil p on r.fk_id_cadastro=p.id_cadastro
                      INNER JOIN dados_pj dp on p.id_cadastro = dp.fk_id_cadastro
                      WHERE g.fk_id_cadastro="'.$id_cadastro.'" GROUP BY p.id_cadastro';

                return $search;

  }


  
  
?>

