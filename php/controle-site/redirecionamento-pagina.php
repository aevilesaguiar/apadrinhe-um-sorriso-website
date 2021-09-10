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
                    10 =>'../../impressao-dados-doacao.php',

    );
        header("Location:$pagina[$codpagina]");
    
    
   
    }

    function retorna_pagina_cadastro($tipo_usuario){

        if($tipo_usuario=="organizacao"){
            
            return 7;

        }else if($tipo_usuario=="doador_pj"){

            return 6;

        }else if($tipo_usuario=="doador_pf"){

            return 5;

        }else{
            return 8;
        }

    }

?>