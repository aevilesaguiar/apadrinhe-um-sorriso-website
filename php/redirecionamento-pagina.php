<?php

function redireciona($codpagina){// função que redireciona as paginas do sistema de acordo com o local de destino

    $pagina = array(0 =>'../pagina-controle-apadrinhamento.php' ,
                    1 =>'../pagina-controle-organizacao.php' ,
                    3 =>'../login.php' ,
                    4 =>'login.php' ,

    );
        header("Location:$pagina[$codpagina]");
    
    
   
    }

?>