<?php

    function consulta_acesso($usuario,$senha){// Seleciona usuário e senha

        $select = 'SELECT * FROM cliente where email="'.$usuario.'" and estado="'.$senha.'"';

        return $select;

    }


?>