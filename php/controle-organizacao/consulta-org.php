
<?php
include 'conexao-banco-org.php';

  function ret_cnjpj_org($fk_user){
    
    $consulta = 'SELECT b.cnpj 
                    FROM perfil a
                    INNER JOIN dados_pj b 
                    ON a.id_cadastro = b.fk_id_cadastro
                    WHERE a.fk_user = "'.$fk_user.'"';
    return $consulta;

}
?>