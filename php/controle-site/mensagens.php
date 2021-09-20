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
                        10=>'CPF Inválido',
                        11=>'Numero inválido',
                        12=>'Senha diferentes',
                        13=>'Senha deve conter no minimo 6 e no máximo 10 caracteres',
                        14=>'CEP Inválido',
                        15=>'Limite de caracteres excedido',
                        16=>'Telefone Inválido',
                        17=>'Usuario já existente',
                        18=>'CNPJ Inválido',
                        19=>'Organização incluida com sucesso',
                        20=>'Organização alterada com sucesso',
                        21=>'Criança e Tipo de Kit incluido com sucesso',
                        22=>'Criança e Tipo de Kit alterado com sucesso',
                        23=>'Selecione uma organização',
                        24=>'Selecione uma Criança e um Kit',
                    );

    return $mensagem[$codmsg];
}



?>

