<?php


function mensagem($codmsg){
    $mensagem = array(   0=>'Usuário ou Senha incorretos',
                        1=>'Usuário não foi localizado em nosso banco de dados',
                        2=>'Falha ao conectar com o banco de dados',
                        3=>'Conectado com sucesso',
                        4=>'O link de redefinição de senha foi enviado para seu email',
                        5=>'Usuario não localizado',
                        6=>'Sua senha foi redefinida com sucesso',
                        7=>'Seu usuário ainda não foi confirmado,por favor acesse seu email.',
                        8=>'Usuário confirmado com sucesso',
                        9=>'Cadastrado com sucesso, foi enviado um link de confirmação no seu email',
                    );

    return $mensagem[$codmsg];
}



?>

