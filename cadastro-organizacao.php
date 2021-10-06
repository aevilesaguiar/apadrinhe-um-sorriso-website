<?php include "php/controle-site/sessao.php"?>;
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

 <title> Cadastro Organização - APADRINHE UM SORRISO </title>
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


<main class="main-board dist-mob-form">
    <div class="dist-menu"></div>
<div class="p-doar">

<div class="altura-doar ">

            <h2>CADASTRO ORGANIZAÇÃO</h2>
        </div>
            <div class="sep-item "></div>
            <div class="dist-menu"></div>
   <div class="sobre-dado-fale">      
    <form class="row g-3  dist-mob-form" method="POST" action="php/controle-site/cadastro.php" >
   
    <div class="col-md-4">

<input type="text" class="form-control"  id="inputCnpj" name="cnpj" value="<?php echo isset($_SESSION['dados_form']['cnpj'])?$_SESSION['dados_form']['cnpj']:"";?>" onKeyPress="MascaraGenerica(this, 'CNPJ');" placeholder="CNPJ" required /> 
<?php echo isset($_SESSION['mensagens_form']['cnpj'])?$_SESSION['mensagens_form']['cnpj']:""; ?>
</div>
<div class="col-md-4">

<input type="text" class="form-control"  id="inputRaSocial" name="razao_social" value="<?php echo isset($_SESSION['dados_form']['razao_social'])?$_SESSION['dados_form']['razao_social']:"";?>" placeholder="Razão Social" required /> 
<?php echo isset($_SESSION['mensagens_form']['razao_social'])?$_SESSION['mensagens_form']['razao_social']:""; ?>
</div>
<div class="col-md-4">

<input type="text" class="form-control" id="inputNfantasia" name="nome_fantasia" value="<?php echo isset($_SESSION['dados_form']['nome_fantasia'])?$_SESSION['dados_form']['nome_fantasia']:"";?>" placeholder="Nome Fantasia" required>
<?php echo isset($_SESSION['mensagens_form']['nome_fantasia'])?$_SESSION['mensagens_form']['nome_fantasia']:""; ?>
</div>

<div class="col-md-6">
  <select id="inputState" name="tipo_organizacao" class="form-select form-control" type="select" required>
          <option value="<?php echo isset($_SESSION['dados_form']['tipo_organizacao'])?$_SESSION['dados_form']['tipo_organizacao']:"Segmento";?>"><?php echo isset($_SESSION['dados_form']['tipo_organizacao'])?$_SESSION['dados_form']['tipo_organizacao']:"Segmento";?></option>
          <option value="COMERCIO">COMERCIO</option>
          <option value="COMUNICAÇÃO">COMUNICAÇÃO</option>
          <option value="ENERGIA">ENERGIA</option>
          <option value="INDUSTRIA">INDUSTRIA</option>
          <option value="PRODUTOR RURAL">PRODUTOR RURAL</option>
          <option value="SERVIÇO">SERVIÇO</option>
          <option value="TRANSPORTE">TRANSPORTE</option>
          <option value="OUTROS">OUTROS</option>
            </select>
      </div>
      <div class="col-md-4">

        <input type="text" class="form-control"  id="inputEmail" name="telefone" value="<?php echo isset($_SESSION['dados_form']['telefone'])?$_SESSION['dados_form']['telefone']:"";?>" onKeyPress="MascaraGenerica(this, 'TELEFONE');" placeholder="Telefone" required /> 
        <?php echo isset($_SESSION['mensagens_form']['telefone'])?$_SESSION['mensagens_form']['telefone']:""; ?>
      </div>

      <div class="col-md-2">

        <input type="text" class="form-control" id="inputZip" name="cep" value="<?php echo isset($_SESSION['dados_form']['cep'])?$_SESSION['dados_form']['cep']:"";?>" onKeyPress="MascaraGenerica(this, 'CEP');" placeholder="CEP" required /> 
        <?php echo isset($_SESSION['mensagens_form']['cep'])?$_SESSION['mensagens_form']['cep']:""; ?>
      </div>
      <div class="col-md-6">

        <input type="text" class="form-control" id="inputAddress" name="endereco" value="<?php echo isset($_SESSION['dados_form']['endereco'])?$_SESSION['dados_form']['endereco']:"";?>" placeholder="Endereço" required>
        <?php echo isset($_SESSION['mensagens_form']['endereco'])?$_SESSION['mensagens_form']['endereco']:""; ?>
      
      </div>
      <div class="col-md-1">

        <input type="text" class="form-control" id="inputNum" name="numero" value="<?php echo isset($_SESSION['dados_form']['numero'])?$_SESSION['dados_form']['numero']:"";?>" placeholder="Numero" required>
        <?php echo isset($_SESSION['mensagens_form']['numero'])?$_SESSION['mensagens_form']['numero']:""; ?>
      </div>

      <div class="col-md-3">

        <input type="text" class="form-control" id="inputNum" name="cidade" value="<?php echo isset($_SESSION['dados_form']['cidade'])?$_SESSION['dados_form']['cidade']:"";?>" placeholder="Cidade" required>
        <?php echo isset($_SESSION['mensagens_form']['cidade'])?$_SESSION['mensagens_form']['cidade']:""; ?>
      </div>
      <div class="col-md-2">
  
        <select id="inputState" class="form-select form-control" name="estado" type="select" required>
        <option value="<?php echo isset($_SESSION['dados_form']['estado'])?$_SESSION['dados_form']['estado']:"Estado";?>"><?php echo isset($_SESSION['dados_form']['estado'])?$_SESSION['dados_form']['estado']:"Estado";?></option>
          <option value="AC">AC</option>
          <option value="AL">AL</option>
          <option value="AP">AP</option>
          <option value="AM">AM</option>
          <option value="BA">BA</option>
          <option value="CE">CE</option>
          <option value="DF">DF</option>
          <option value="ES">ES</option>
          <option value="GO">GO</option>
          <option value="MA">MA</option>
          <option value="MT">MT</option>
          <option value="MS">MS</option>
          <option value="MG">MG</option>
          <option value="PA">PA</option>
          <option value="PB">PB</option>
          <option value="PR">PR</option>
          <option value="PE">PE</option>
          <option value="PI">PI</option>
          <option value="RJ">RJ</option>
          <option value="RN">RN</option>
          <option value="RS">RS</option>
          <option value="RO">RO</option>
          <option value="RR">RR</option>
          <option value="SC">SC</option>
          <option value="SP">SP</option>
          <option value="SE">SE</option>
          <option value="TO">TO</option>
            </select>
      </div>

      <div class="col-md-4">

        <input type="text" class="form-control" id="inputAddress" name="bairro" value="<?php echo isset($_SESSION['dados_form']['bairro'])?$_SESSION['dados_form']['bairro']:"";?>" placeholder="Bairro" required>
        <?php echo isset($_SESSION['mensagens_form']['bairro'])?$_SESSION['mensagens_form']['bairro']:""; ?>
      </div>
      <div class="col-md-8">

        <input type="text" class="form-control" id="inputCity" name="complemento" value="<?php echo isset($_SESSION['dados_form']['complemento'])?$_SESSION['dados_form']['complemento']:"";?>" placeholder="Complemento" required>
        <?php echo isset($_SESSION['mensagens_form']['complemento'])?$_SESSION['mensagens_form']['complemento']:""; ?>
      </div>

      <div class="col-md-6">

        <input type="text" class="form-control" id="inputAddress" name="site" value="<?php echo isset($_SESSION['dados_form']['site'])?$_SESSION['dados_form']['site']:"";?>" placeholder="Site" >
        <?php echo isset($_SESSION['mensagens_form']['site'])?$_SESSION['mensagens_form']['site']:""; ?> 
      </div>

      <div class="col-md-6">

        <input type="text" class="form-control" id="inputAddress" name="rede_social" value="<?php echo isset($_SESSION['dados_form']['rede_social'])?$_SESSION['dados_form']['rede_social']:"";?>" placeholder="Rede Social" >
        <?php echo isset($_SESSION['mensagens_form']['rede_social'])?$_SESSION['mensagens_form']['rede_social']:""; ?>
      </div>
    
      <div class="col-md-4">

      <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo isset($_SESSION['dados_form']['email'])?$_SESSION['dados_form']['email']:"";?>" placeholder="E-mail">
      <?php echo isset($_SESSION['mensagens_form']['email'])?$_SESSION['mensagens_form']['email']:""; ?>  
      <?php echo isset($_SESSION['mensagens_form']['email2'])?$_SESSION['mensagens_form']['email2']:""; ?>
    </div>
      <div class="col-md-4">

        <input type="password" class="form-control" id="inputPassword4" name="senha" placeholder="Digite uma senha" required>
        <?php echo isset($_SESSION['mensagens_form']['senha'])?$_SESSION['mensagens_form']['senha']:""; ?>
      </div>
      <div class="col-md-4">
 
        <input type="password" class="form-control" id="inputPassword4" name ="confirm_senha" placeholder="Confirme a  senha" required>
      </div>

      <div class="col-md-12">
        <textarea type="mensagem" class="form-control" aria-label="With textarea" name="informacoes" value="<?php echo isset($_SESSION['dados_form']['informacoes'])?$_SESSION['dados_form']['informacoes']:"";?>"  placeholder="Informacoes de Recebimento" style="height: 120px;"></textarea>
      </div>
      <input name="tipo_usuario" type="hidden" value="organizacao"/>
        <div class="dist-menu-botao"></div>
<div class="sobre-dado-fale dist-menu-botao">
  <input class="button-menu-form" name="btnCadastraUsuario" type="submit" value="CADASTRAR">
    </div>
      </div>
            <div class="dist-menu"></div>
            
</form>
  
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
    <p>©2021 | APADRINHE UM SORRISO</p>
    </div>
    <div>


    </div>

</footer>

</body>

</html>