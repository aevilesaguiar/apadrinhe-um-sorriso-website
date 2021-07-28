<?php

    function consulta_acesso($usuario,$senha){// Seleciona usuário e senha

        $select = 'SELECT * FROM usuario where usuario="'.$usuario.'" and senha="'.$senha.'"';

        return $select;

    }


?>