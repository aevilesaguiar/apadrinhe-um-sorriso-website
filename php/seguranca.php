<?php

    if($_GET["sair"]=="true"){// Encerra sessão caso usuário deseja sair do login
    include "sessao.php";
    include "redirecionamento-pagina.php";
    encerra_sessao();
    redireciona(3);
    }else if(empty($_SESSION['logado']) || $_SESSION['logado']!== true){// Expulsa usuário caso não esteja conectado
        redireciona(4);
    }
    

?>