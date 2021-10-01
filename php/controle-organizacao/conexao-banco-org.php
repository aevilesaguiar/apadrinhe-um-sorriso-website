<?php
    $host = "LOCALHOST"; //Servidor
    $usuario = "root"; //Usuário do Servidor
    $senha = ""; //Senha do servidor
    $banco="doe_um_sorriso"; //Nome do banco

    $conecta = mysqli_connect($host,$usuario,$senha,$banco) or die ("Erro de conexão");

?>