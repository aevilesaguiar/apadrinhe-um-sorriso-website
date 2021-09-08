<?php   
  include "php/geral/conexao-banco.php";  
  include "php/controle-site/sessao.php"; //Inicia sessao e encerra sessões
  include "php/controle-site/redirecionamento-pagina.php";//Registro de todas as paginas para redirecionamento
  include "php/controle-site/seguranca.php";//Expulsa usuário desta pagina caso não esteja logado
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
<script
src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
crossorigin="anonymous"></script>
<script src="js/mask.js"></script>

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

 <title> Dados Doação- APADRINHE UM SORRISO </title>
</head>
<body>
 <header class="menu-bg">
        <div class=" menu" >

                <div class="menu-logo">
                 <a href="#"> <img src="image/logotipo-1.svg" alt="logo-menu">
                 </a>
                 </div> 

              
             <nav class="menu-nav"><!--flexitem é o na-->
                <ul>
                    <li class="item"><a href="index.php">INÍCIO</a></li>
                    <li class="item menu-sep"><a href="index.php">SOBRE NÓS</a></li>
                    <li class="item menu-sep"><a href="index.php">POR QUE DOAR?</a></li>
                    <li class="item menu-sep"><a href="index.php">COMO DOAR?</a></li>
                    <li class="item menu-sep"><a href="index.php">SERVIÇO</a></li>              
                    <li class="item menu-sep"><a href="index.php">CONTATO</a></li>

                    <div><a class="button-menu" href="login.php" ><i class="fas fa-hand-holding-heart" aria-hidden="true"></i>APADRINHAR</a>
                    </div>
                    <div>
                    <?php if(isset($_SESSION['logado'])!==TRUE){?>
                    <a class=" button-menu" href="login.php" ><i class="fas fa-hand-holding-heart" aria-hidden="true"></i>
                    LOGAR
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

            <h2>DADOS DOAÇÃO</h2>
        </div>
            <div class="sep-item "></div>
            <div class="dist-menu"></div>
            
   <div class="textos-item">   

   <table class="table">
  <thead>
  <tr>
     <th class="text4" scope="col" >Usuario</th>
      <th class="text4" scope="col">E-mail</th>
      <th class="text4" scope="col" >Telefone</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <th scope="row"><?php echo $_SESSION['usuario']; ?></th>
    <td><?php echo $_SESSION['email'];?></td>
    <td><?php echo$_SESSION['telefone'];?></td>
    </tr>
  </tbody>
</table>

<div style="text-align: center;"> 
 <input  class="button-menu-form"  type="submit" value="EDITAR CADASTRO">

 </div>
 <div class="dist-bot-button"></div>

 
   <form class="row g-3" method="POST" action="php/controle-site/cadastro.php">
  <div class="col-md-10">
  <select id="inputState" name="organizacao" class="form-select form-control" type="select">
          <option value="<?php echo isset($_SESSION['doacao']['id_cadastro'])?$_SESSION['doacao']['organizacao_selecionada']:'Selecione uma organização';?>"><?php echo isset($_SESSION['doacao']['id_cadastro'])?$_SESSION['doacao']['organizacao_selecionada']:'Selecione uma organização';?></option>
          <?php
              $organizacao = $conecta->query(lista_organizacao());
              if($organizacao->num_rows>=1){
                foreach($organizacao as $dados){
          ?>
          <option><?php echo $dados['id_cadastro']." - ".$dados['nome']." - ".$dados['cidade']." - ".$dados['estado'];?></option>
          <?php  }
            }else{
          ?>
                  <option>Indisponível no momento</option>    
          <?php    
                }
            
          ?>
            </select>
  </div>

  <div class="col-md-2">
  <?php if(isset($_SESSION['doacao']['acao'])==1){?>
    <input class="button-menu-form"  name="btnAlterarOrg" type="submit" value="ALTERAR">
  <?php }else if(isset($_SESSION['doacao']['acao'])==0){?>
  <input class="button-menu-form"  name="btnIncluirOrg" type="submit" value="INCLUIR">
  <?php }else{?>
  <input class="button-menu-form"  name="btnIncluirOrg" type="submit" value="INCLUIR">
  <?php } ?>
  </div>
  <div class="col-md-12">
    <p class="text4 " style="text-align: center; margin-bottom:30px;"><?php if(isset($_SESSION['mensagem'])){echo$_SESSION['mensagem'];};?></p>
      </div>

</form>  
<div class="dist-menu-botao"></div>


   <form class="row g-3" method="POST" action="php/controle-site/cadastro.php">
  <div class="col-md-6">
  <select id="inputState" name="dados_crianca" class="form-select form-control" type="select">
            <option value="<?php echo isset($_SESSION['doacao']['rg_crianca'])?$_SESSION['doacao']['crianca_selecionada']:'Selecione uma criança';?>"><?php echo isset($_SESSION['doacao']['rg_crianca'])?$_SESSION['doacao']['crianca_selecionada_exib']:'Selecione uma criança';?></option>
            <?php if(isset($_SESSION['doacao']['id_cadastro'])){?>
            <?php $criancas = $conecta->query(lista_criancas($_SESSION['doacao']['id_cadastro']));
                  if($criancas->num_rows>=1){
                    foreach($criancas as $dados_criancas){
            ?>
          <option value='<?php echo $dados_criancas['rg_crianca']."/".$dados_criancas['nome_crianca']."/".$dados_criancas['nasc_crianca']."/".$dados_criancas['sexo']."/".$dados_criancas['tamanho_camiseta']."/".$dados_criancas['tamanho_sapato']."/".$dados_criancas['tamanho_calca'];?>'>
          <?php echo $dados_criancas['nome_crianca']."-".$dados_criancas['nasc_crianca']."-".$dados_criancas['sexo'];?>
          </option>
          <?php    
                    }
                  } 
                }   
              
          ?>
  </select>
  </div>
  <div class="col-md-4">
  <select id="inputState" name="tipo_kit" class="form-select form-control" type="select">
  <option value="<?php echo isset($_SESSION['doacao']['rg_crianca'])?$_SESSION['doacao']['tipo_kit']:'Tipo Kit';?>"><?php echo isset($_SESSION['doacao']['rg_crianca'])?$_SESSION['doacao']['tipo_kit']:'Tipo Kit';?></option>
          <option > KIT SIMPLES </option>
          <option > KIT COMPLETO </option>
            </select>
  </div>
  <div class="col-md-2">
  <?php if(isset($_SESSION['doacao']['acaocriancakit'])==1){?>
    <input class="button-menu-form"  name="btnAlterarCriancaKit" type="submit" value="ALTERAR">
  <?php }else if(isset($_SESSION['doacao']['acao'])==0){?>
  <input class="button-menu-form"  name="btnIncluirCriancaKit" type="submit" value="INCLUIR">
  <?php }else{?>
  <input class="button-menu-form"  name="btnIncluirCriancaKit" type="submit" value="INCLUIR">
  <?php } ?>
  </div>
</form>


<div>
  <h2>O que você está Doando</h2>

</div>
<div class="dist-bot-button"></div>
<table class="table">
  <thead>
  <tr>
      <th scope="col">#</th>
      <th scope="col">Calça</th>
      <th scope="col">Camisa</th>
      <th scope="col">Calçado</th>
      <th scope="col"><?php echo exibe_doacao('tipo_kit');?></th>
      <th scope="col">Briquedo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo exibe_doacao('tamanho_calca');?></td>
      <td><?php echo exibe_doacao('tamanho_camisa');?></td>
      <td><?php echo exibe_doacao('tipo_calcado');?></td>
      <?php if(exibe_doacao('tipo_kit')=="KIT SIMPLES"){ ?>
      <td>  <li>3 Cadernos capa dura com 160 folhas</li>
                <li>1 apontador</li>
                <li>2 borrachas</li>
                <li>3 lápis de escrita HB</li>
                <li>1 Caixa de lápis de cor -12 uni</li>
                <li>1 Caixa de canetinha hidrográfica-12 uni</li>
                <li>1 tesoura sem ponta</li>
                <li>1 cola bastão</li> </td>   
                <?php }else if(exibe_doacao('tipo_kit')=="KIT COMPLETO"){?> 
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
    </tr>
  </tbody>
</table>


<div>
  <h2>Para quem você está doando</h2>

</div>
<div class="dist-bot-button"></div>
<table class="table">
  <thead>
  <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Idade</th>
      <th scope="col">Sexo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo exibe_doacao('nome_crianca');?></td>
      <td><?php echo calcula_idade(exibe_doacao('idade'));?></td>
      <td><?php echo exibe_doacao('sexo');?></td>
 
    </tr>
  </tbody>
</table>

<div style="text-align: right;"> 
 <a href="confirmacao-dados-doacao.php"> <button class="button-menu-form" type="submit">AVANÇAR</button> </a>

 </div>
 <div class="dist-bot-button"></div>

   </div>
</main>

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
        <p>©2020 | APADRINHE UM SORRISO</p>
    </div>
    <div>


    </div>

</footer>

</body>

</html>