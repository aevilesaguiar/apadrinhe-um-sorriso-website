<?php


function mensagem($codmsg){
    $mensagem = array(   0=>'Usuário ou Senha incorreto',
                        1=>'Usuário não foi localizado em nosso banco de dados',
                        2=>'Falha ao conectar com o banco de dados',
                        3=>'Conectado com sucesso',
                        4=>'O link de redefinição de senha foi enviado para seu email',
                        5=>'Usuario não localizado',
                        6=>'Sua senha foi redefinida com sucesso',
                        7=>'Seu usuário ainda não foi confirmado.Por favor, acesse seu email.',
                        8=>'Usuário confirmado com sucesso!',
                        9=>'Cadastrado com sucesso! Foi enviado um link de confirmação no seu email',
                        10=>'CPF Inválido',
                        11=>'Numero inválido',
                        12=>'Senhas diferentes',
                        13=>'Senhas deve conter no mínimo 6 e no máximo 10 caracteres',
                        14=>'CEP Inválido',
                        15=>'Limite de caracteres excedido',
                        16=>'Telefone Inválido',
                        17=>'Usuario já existente',
                        18=>'CNPJ Inválido',
                        19=>'Organização incluída com sucesso!',
                        20=>'Organização alterada com sucesso!',
                        21=>'Criança e Tipo de Kit incluído com sucesso!',
                        22=>'Criança e Tipo de Kit alterado com sucesso!',
                        23=>'Selecione uma organização',
                        24=>'Selecione uma Criança e um Kit',
                        25=>'Os dados foram atualizados com sucesso!',
                        26=>'Mensagem enviada com sucesso, entraremos em contato com você o mais breve possível, obrigado !',
                        27=>'Obrigado por cadastrar seu e-mail!',
                        28=>'Aprovado com sucesso',
                        29=>'Cadastro foi reprovado e doador notificado! </br>
                        As mensagens enviadas para o doador serão exibidas aqui, abaixo dos dados cadastrais do doador.',
                        30=>'Notificação finalizada para doador !',
                        31=>'A doação foi aprovada com sucesso e agora está na lista para entrega !',
                        32=>'A doação foi reprovada e doador foi notificado! </br>
                        As mensagens enviadas para o doador serão exibidas aqui, abaixo dos dados cadastrais do doador.',
                        33=>'Notificação resolvida !',
                        34=>'Entrega registrada com sucesso !',

                    );

    return $mensagem[$codmsg];
}



?>

