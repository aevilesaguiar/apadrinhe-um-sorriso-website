<?php
    include 'php/geral/conexao-banco.php';
    include "php/controle-site/sessao.php"; //Inicia sessao e encerra sessões
    include "php/controle-site/consulta.php";
    include 'php/controle-site/funcoes-sistema.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="apple-touch-icon" sizes="57x57" href="image/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="image/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="image/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="image/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="image/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="image/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="image/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="image/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="image/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="image/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="image/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="image/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="image/favicon/favicon-16x16.png">
<link rel="manifest" href="image/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="image/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/mask.js"></script>

<script
src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
crossorigin="anonymous"></script>


<script>
$(function() {
$(".toggle").on("click", function() {
    if ($(".item").hasClass("active")) {
        $(".item").removeClass("active");
    } else {
        $(".item").addClass("active");
    }
});
});
    
    </script>

</head>


<link rel="stylesheet" type="text/css" href="css/style.css">

 <title>Doações Realizadas- APADRINHE UM SORRISO </title>
</head>
<body>
 <header class="menu-bg">
        <div class=" menu" >

                <div class="menu-logo">
                 <a href="#"> <img src="image/logotipo-1.svg" alt="logo-menu">
                 </a>
                 </div> 

              
             <nav class="menu-nav"><!--flexitem é o nav-->
                <ul>
                    <li class="item"><a href="index.php">INÍCIO</a></li>
                    <li class="item menu-sep"><a href="index.php">SOBRE NÓS</a></li>
                    <li class="item menu-sep"><a href="index.php">POR QUE DOAR?</a></li>
                    <li class="item menu-sep"><a href="index.php">COMO DOAR?</a></li>
                    <li class="item menu-sep"><a href="index.php">SERVIÇO</a></li>              
                    <li class="item menu-sep"><a href="index.php">CONTATO</a></li>

                    <div><a class="button-menu" href="login.php" ><i class="fas fa-hand-holding-heart" aria-hidden="true"></i>APADRINHAR</a>
                    </div>
                    <?php if(isset($_SESSION['logado'])!==TRUE){?>
                    <a class=" button-menu" href="login.php" ><i class="fas fa-hand-holding-heart" aria-hidden="true"></i>
                    SAIR
                    </a>
                    <?php }else{ ?>
                    <a class=" button-menu" href="php/controle-site/seguranca.php?sair=true" ><i class="fas fa-hand-holding-heart" aria-hidden="true"></i>
                    SAIR
                    </a>
                    <?php }?>
                    </div>
                     <li class="toggle"><span class="bars"></span></li>
                </ul>


            </nav>
         
           
        </div>
</header>


<main class="main-board dist-mob-form">
    <div class="dist-menu"></div>
<div class="p-doar">

<div class="altura-doar ">

            <h2 class="tit">DOAÇÕES REALIZADAS</h2>
        </div>
            <div class="sep-item "></div>
            
            <?php

            $doacoes_realizadas = $conecta->query(lista_doacoes_realizadas($_SESSION['usuario']['id_cadastro']));

            if($doacoes_realizadas->num_rows>=1){
            foreach($doacoes_realizadas as $doacoes){
            
            ?>
    <form method="POST" action="impressao-dados-doacao.php">       
   <div class="textos-item " >   
   <div class="container">
   <div class="dist-bot-button"></div>
     <table class="table">
        <thead>

            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Organização</th>
                <th scope="col">Nome da Criança</th>
                <th scope="col">Sexo</th>
                <th scope="col">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"><?php echo $doacoes['id_doacao'];?><input type="hidden" name="id_doacao" value="<?php echo $doacoes['id_doacao'];?>"/></th>
                <td><?php echo $doacoes['nome'];?></td>
                <td><?php echo $doacoes['nome_crianca'];?></td>
                <td><?php echo $doacoes['sexo'];?></td>
                <td><?php echo $doacoes['status_doacao'];?> </td>
            </tr>
        </tbody>
        </table>
        <div class="dist-menu"></div>


        <div class="dist-menu"></div>
        <table class="table">
        <thead>
        <tr>
<th colspan="3" style="text-align: center;">Informações Doações</th>
</tr>
            <tr>
                <th scope="col"> Item</th>
                <th scope="col">Data/Hora</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">Data de entrega do presente para criança</th>
                <td><?php echo $doacoes['data_hora_entrega']==null?"":inverte_data($doacoes['data_hora_entrega']);?></td>
            </tr>
        </tbody>
            <tbody>
                <tr>
                <th scope="row">Presente Entregue na ONG</th>
                <td><?php echo $doacoes['data_hora_recebimento']==null?"":inverte_data($doacoes['data_hora_recebimento']);?></td>
            </tr>
        </tbody>
        <tbody>
                <tr>
                <th scope="row">Aguardando envio do Presente</th>
                <td><?php echo inverte_data($doacoes['data_hora_selecao']);?></td>
            </tr>
        </tbody>
        <tbody>
                <tr>
                <th scope="row">Doação Realizada</th>
                <td><?php echo inverte_data($doacoes['data_hora_selecao']);?></td>
            </tr>
        </tbody>
        </table>

        <div class="dist-menu-botao"></div>
       
        <div style="text-align: center;"> 
            <input class="button-menu-form" type="submit" name="btnVisualizarDoacao" value="VISUALIZAR DOAÇÃO">
        </div>
            </form>
        <div class="dist-bot-button"></div>
        <?php
            if($doacoes['status_doacao']=="FINALIZADO"){
        ?>
        <p class="text-php-aprovado"> Agradecemos a sua Doação!</p>
        <?php
            }else if($doacoes['status_doacao']=="REPROVADO"){
                $notificacao = $conecta->query(consulta_mensagem_doacao($doacoes['id_doacao']));

                if($notificacao->num_rows>=1){
                    foreach($notificacao as $notificacaodoacao){
                        if($notificacaodoacao['status_sistema']!=="FINALIZADO"){
        ?>
        <p class="text-php-reprovado"> <?php echo $notificacaodoacao['mensagem'] ?></p>
        <?php
                        }    
                    }
            }
        }
        ?>
        <div class="dist-bot-button"></div>
   </div>               
</div>
</main>
<?php 
        }
    }else{

        echo "<div style='text-align:center; border:2px ;'><br></br><p>Sem doação no momento<a href='dados-doacao.php'><button style='padding: 15px 25px;
        margin-left:30px ;
        font-size: 1.2em;
        text-align: center;
        color: #fff;
        background-color: #F57600;
        border-radius: 3px;
        box-shadow: 0 2px #999; 
        '>Doar</button></a></p> <br><br></div>";

    }
?>

<footer >
    <div class="sep-item-footer-1"></div>
    <div class="sobre-dado-footer">

        <div class="sobre-item-footer">
            <h3 class="t-icon-footer">QUEM SOMOS</h3>
            <ul>
                <li ><a href="index.php">Sobre Nós</a></li>
            </ul>

        </div>

        <div class="sobre-item-footer">
            <h3 class="t-icon-footer">DOAÇÕES</h3>

            <ul>
                <li class="footer-itens"><a href="index.php">Porque-doar</a></li>
                <li class="footer-itens"><a href="index.php">Como doar?</a></li>
                <li class=" footer-itens"><a href="cadastro-pessoa-juridica.php">Doação Empresa</a></li>
                <li class=" footer-itens"><a href="cadastro-pessoa-fisica.php">Doação Pessoa Física</a></li>
            </ul>
        </div>

        <div class="sobre-item-footer">
            <h3 class="t-icon-footer">CONTATO</h3>
            <ul>
                <li class="footer-itens"><a href="index.php">Fale Conosco</a></li>
                <li class="footer-itens"><a href="index.php">Newsletter</a></li>
                <li class="footer-itens"><a href="index.php">Taxa de Serviços</a></li>
            </ul>
        </div>
        <div class="sobre-item-footer">
            <h3 class="t-icon-footer">REDES SOCIAIS</h3>
          <div>
            <li class="footer-lista simb"><a href="https://www.facebook.com/" target=_blank title=Facebook><img src="image/iconrede/facebook.svg" alt="">   </a></li>
            <li class="footer-lista simb"><a href="https://instagram.com/" target=_blank  title=Twitter><img src="image/iconrede/instagram.svg" alt=""></a></li>
            <li class="footer-lista simb"><a href="https://twitter.com" target=_blank  title=linkedin><img src="image/iconrede/twitter.svg" alt=""></a></li>
            <li class="footer-lista simb"><a href="https://www.youtube.com/" target=_blank  title=YouTube><img src="image/iconrede/youtube.svg" alt=""></a></li>
          </div>
           
        </div>



    </div>
    <div class="sep-item-footer"></div>
        
    <div class="sobre-dado-footer sobre-dado-footer-rod">
    <p>©2021 | APADRINHE UM SORRISO</p>
    </div>
    <div>


    </div>

</footer>

</body>

</html>