<?php
  
 //Seleciona doações referente a organização logada
  $search = 'SELECT re.nome, b.nome_crianca, c.id_doacao
                FROM perfil a
                INNER JOIN gerencia d
                ON d.fk_id_cadastro=a.id_cadastro
                INNER JOIN realiza r
                ON r.fk_id_doacao=d.fk_id_doacao
                INNER JOIN perfil re
                ON re.id_cadastro=r.fk_id_cadastro
                INNER JOIN doacao c
                ON c.id_doacao = d.fk_id_doacao
                INNER JOIN dados_crianca b
                ON b.rg_crianca = c.fk_rg_crianca
                
                WHERE c.data_hora_recebimento IS NULL AND d.fk_id_cadastro="'.$_SESSION['usuario_org']['id_cadastro'].'"';
  $result_search = mysqli_query($conecta, $search);

?>