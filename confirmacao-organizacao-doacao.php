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

 <title>Impressão Dados Doação- APADRINHE UM SORRISO </title>
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
                    <div><a class=" button-menu" href="login.php" ><i class="fas fa-hand-holding-heart" aria-hidden="true"></i>LOGAR</a>
                    </div>
                     <li class="toggle"><span class="bars"></span></li>
                </ul>


            </nav>
         
           
        </div>
</header>

<?php

    $id_doacao = $_GET['id_doacao'];
    
    $doacao = $conecta->query(consulta_doacao($id_doacao));

    foreach($doacao as $dados){}

    $doador = $conecta->query(consulta_doador($dados['fk_id_doacao']));

    foreach($doador as $nome){}

    if($nome['tipo_cadastro']=="doador_pj"){
            $numero=cnpj($nome['id_cadastro']);
            $tipo_doc="CNPJ";
    }else if($nome['tipo_cadastro']=="doador_pf"){
            $numero=cpf($nome['id_cadastro']);
            $tipo_doc="CPF";
    }

    if($doacao->num_rows>=1){

?>

<main class="main-board dist-mob-form">
    <div class="dist-menu"></div>
<div class="p-doar">

<div class="altura-doar ">

    <h2 class="tit">RECEBIMENTO DOAÇÃO</h2>
        </div>
            <div class="sep-item "></div>

            
   <div class="textos-item myDivToPrint" >   
   <div class="container">
   <p style="text-align: center; margin-bottom:20px; color: orange;" ><?php if(isset($_SESSION['mensagem'])){echo$_SESSION['mensagem'];};?></p>  
   <div class="col-md-12">
      <div class="col-md-12">
    <p class="text4 " style="text-align: left; margin-bottom:30px;  font-weight: 600; font-size:1.5em; ">Doação <?php echo $dados['fk_id_doacao'];?></p>    
      </div>
      <div class="col-md-12">
    <p class="text4 " style="text-align: left; margin-bottom:30px;  font-weight: 600; font-size:1.5em; "></p>
      </div>
      <div class="col-md-12">
    <p style="text-align: left; margin-bottom:30px;  font-weight: 600; font-size:1.5em; ">Doador : <?php echo $nome['nome'];?></p>
   </p>
    <p style="text-align: left; margin-bottom:30px;  font-weight: 600; font-size:1.5em; "><?php echo $tipo_doc." : ".$numero;?></p>
    </p>
      </div>
      <div class="dist-menu"></div>


      <table class="table">
  <thead>
  <tr>
<th colspan="3" style="text-align: center;">Dados da Criança</th>
</tr>
  <tr>

       <th class="text4" scope="col">Nome</th>
       <th class="text4"  scope="col">Idade</th>
       <th class="text4" scope="col">Sexo</th>
    </tr>
  </thead>
  <tbody>
    <tr>

      <td><?php echo $dados['nome_crianca'];?></td>
      <td><?php echo calcula_idade($dados['nasc_crianca']);?></td>
      <td><?php echo $dados['sexo'];?></td>
 
    </tr>
  </tbody>
</table>

    <div class="dist-bot-button"></div>
     <table class="table">
        <thead>
        <tr>
        <th colspan="7"  style="text-align: center;">Doação</th>
            </tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Calça</th>
                <th scope="col">Camisa</th>
                <th scope="col">Calçado</th>
                <th scope="col"><?php echo $dados['tipo_presente'];?></th>
                <th scope="col">Briquedo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td><?php echo $dados['tamanho_calca'];?></td>
                <td><?php echo $dados['tamanho_camiseta'];?></td>
                <td><?php echo $dados['tamanho_sapato'];?></td>
                <?php if($dados['tipo_presente']=="KIT SIMPLES"){ ?>
      <td>  <li>3 Cadernos capa dura com 160 folhas</li>
                <li>1 apontador</li>
                <li>2 borrachas</li>
                <li>3 lápis de escrita HB</li>
                <li>1 Caixa de lápis de cor -12 uni</li>
                <li>1 Caixa de canetinha hidrográfica-12 uni</li>
                <li>1 tesoura sem ponta</li>
                <li>1 cola bastão</li> </td>   
                <?php }else if($dados['tipo_presente']=="KIT COMPLETO"){?> 
                  <td>  <li>6 Cadernos capa dura com 160 folhas/li>
                <li>1 apontador</li>
                <li>2 borrachas</li>
                <li>3 lápis de escrita HB</li>
                <li>1 Caixa de lápis de cor -12 uni</li>
                <li>1 Caixa de canetinha hidrográfica-12 uni</li>
                <li>1 Caixa de giz de cera -12 unidades</li>
                <li>1 estojo para lapis</li>
                <li>1 mochila escolar</li>
                <li>1 tesoura sem ponta</li>
                <li>1 cola bastão</li> </td> 
               <?php }?>
                <td><?php echo $dados['brinquedo'];?></td>
    </tr>
        </tbody>
        </table>
            <div class="dist-bot-button"></div>
            <div class="btn-info-geral">
           <div class="alt-form"></div>
          <a href="php/controle-organizacao/aprovar-cadastro-doador-pj-org.php?btnAprovarDoacao=<?php echo $_GET['id_doacao'];?>"><button class="button-menu-form">APROVAR DOAÇÃO</button></a>
          <a href="reprovar-doacao.php?codigo=<?php echo $_GET['id_doacao'];?>"><button class="button-menu-form">REPROVAR DOAÇÃO</button></a>
         <button class="button-menu-form" type="submit" onclick="window.print()">IMPRIMIR DOAÇÃO</button>
          </div>
        </div>

  <div class="dist-bot-button"></div>
   </div>               
</div>
</main>
<?php }else{

    echo "<br/>Sem doação no momento";

} ?>
<table class="table" >
    
    <?php
                $status_cadastro = $conecta->query(consulta_status_doacao($_GET['id_doacao']));
                foreach($status_cadastro as $status){
                }
            ?>
                
                    <?php

                if($status['status_doacao']!=="FINALIZADO"){
            ?>
 
                
                <thead>
        <tr>
        <th colspan="3" style="text-align: center;">Notificações Doador : </th>
    </tr>
            <tr>
                <th scope="col"> Mensagem</th>
                <th scope="col">STATUS</th>
                </tr>
            </thead><tbody>
            <?php
                
                $mensagens = $conecta->query(consulta_mensagem_doacao($_GET['id_doacao']));

                if($conta=$mensagens->num_rows>=1){
                foreach($mensagens as $status_mensagem){
                    if($status_mensagem['status_sistema']!=="FINALIZADO"){
            ?>
                <form  method="POST" action='php/controle-organizacao/aprovar-cadastro-doador-pj-org.php'>
                <tr>
                <td scope="col"> <?php echo $status_mensagem['mensagem']; ?></td>
                <td scope="row"><?php echo $status_mensagem['status_sistema']; ?></td>
                <td><input name="btnResolvidoDoacao" type="submit" value="RESOLVIDO"/></td>
                <input type="hidden" name="id_mensagem" value=" <?php echo $status_mensagem['id_mensagem'];?>"/>
                <input type="hidden" name="id_doacao" value="<?php echo $_GET['id_doacao']; ?>"/>
               
                    </form>
            </tr>
        
            <?php
                }
            }
            }

          }
        
          ?>   </tbody> </table>
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