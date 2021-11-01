
<?php

  function ret_cnjpj_org($id_org){
    
    $consulta = 'SELECT *
                    FROM dados_pj where fk_id_cadastro="'.$id_org.'"';
    return $consulta;

}
?>