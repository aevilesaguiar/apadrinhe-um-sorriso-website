<?php

function redireciona($codpagina){// função que redireciona as paginas do sistema de acordo com o local de destino

    $pagina = array(0 =>'../../pagina-controle-apadrinhamento.php' ,
                    1 =>'../../pagina-controle-organizacao.php' ,
                    3 =>'../../login.php' ,
                    4 =>'login.php' ,
                    5 =>'../../cadastro-pessoa-fisica.php' ,
                    6 =>'../../cadastro-pessoa-juridica.php',
                    7 =>'../../cadastro-organizacao.php',
                    8 =>'../../index.php',
                    9 =>'../../dados-doacao.php',
                    10 =>'../../impressao-dados-doacao.php?btnDoar=1',
                    11 =>'../../confirmacao-dados-doacao.php',
                    12=>'../../editar-cadastro-pessoa-fisica.php',
                    13 =>'../../index.php#contato',
                    14 =>'../../editar-cadastro-pessoa-juridica.php',
                    15 =>'../../index.php#newsletter',
                    16 =>'../../lista-recebimento-doacoes.php',
                    17=>'../../lista-confirmacao-de-entrega.php',

    );
        header("Location:$pagina[$codpagina]");
    
    
   
    }

    function retorna_pagina_cadastro($tipo_usuario,$acao){

        if($tipo_usuario=="organizacao" && $acao=="cadastro"){
            
            return 7;

        }else if($tipo_usuario=="doador_pj" && $acao=="cadastro"){

            return 6;

        }else if($tipo_usuario=="doador_pf"){
            if($acao=="cadastro"){
                return 5;
            }else if($acao=="alteracao"){
                return 12;
            }

        }else if($tipo_usuario=="doador_pj"){
            if($acao=="cadastro"){
                return 6;
            }else if($acao=="alteracao"){
                return 14;
            }
        }else{
            return 8;
        }

    }

    function redireciona_get($codpagina,$cod){// função que redireciona as paginas do sistema de acordo com o local de destino

        $pagina = array(
                        16=>'../../aprovar-cadastro-pj.php?codigo='.$cod.'',
                        17=>'../../aprovar-cadastro-pj.php?codigo='.$cod.'#notificacao',
                        18=>'../../aprovar-cadastro-pf.php?codigo='.$cod.'#notificacao',
                        19=>'../../confirmacao-organizacao-doacao.php?id_doacao='.$cod.'',
    
        );
            header("Location:$pagina[$codpagina]");
        
        
       
    }


?>