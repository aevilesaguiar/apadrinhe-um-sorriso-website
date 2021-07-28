<?php


function mensagem($codmsg){
    $mensagem = array(   0=>'Usuário ou Senha incorretos',
                        1=>'Usuário não foi localizado em nosso banco de dados',
                        2=>'Falha ao conectar com o banco de dados',
                        3=>'Conectado com sucesso',
                    );

    return $mensagem[$codmsg];
}



?>

