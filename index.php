<?php include "php/controle-site/sessao.php"; //Inicia sessao e encerra sessões?>
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
<title>APADRINHE UM SORRISO </title>
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
                    <li class="item menu-sep"><a href="#sobre">SOBRE NÓS</a></li>
                    <li class="item menu-sep"><a href="#pdoar">POR QUE DOAR?</a></li>
                    <li class="item menu-sep"><a href="#doar">COMO DOAR?</a></li>
                    <li class="item menu-sep"><a href="#taxas">SERVIÇO</a></li>              
                    <li class="item menu-sep"><a href="#contato">CONTATO</a></li>
                    <div><a class="button-menu" href="login.php" ><i class="fas fa-hand-holding-heart" aria-hidden="true"></i>APADRINHAR</a>
                    </div>
                    <div><a class=" button-menu" href="login.php" ><i class="fas fa-hand-holding-heart" aria-hidden="true"></i>LOGAR</a>
                    </div>
                     <li class="toggle"><span class="bars"></span></li>
                </ul>

            </nav>
           
        </div>
</header>

<main class="main-board">
    <div class="hero-image" id="inicio">
                <div class="hero-text">
                    <h1>Você pode fazer parte DISSO!<br>O que para você pode ser um simples presente para eles pode ser um Sonho</h1>
                   
                    <div class="btn-info-geral">
                        <div class="alt-form"></div>
                        <a href="login.php"> <button class="button-menu-form" type="submit">FAÇA O SEU CADASTRO</button> </a>
                  </div>

                    </div>   
      </div>


 </main>
 
<section class="sobre" id="sobre" >
        <div class="sobre-info"> 

    <h2>SOBRE NÓS</h2>

            <div class="sep-item"></div>
            <div class="textos-item">
            <p> O APADRINHE UM SORRISO é uma iniciativa sem fins lucrativos que conecta pessoas, empresas , ações e organizações.</p>
           <p>Percebemos a necessidade de uma ferramenta que pudesse auxiliar as pessoas e empresas a realizarem doações de uma forma rápida e segura, e o Apadrinhe um Sorriso 
            tem essa  proposta de ser um local onde todos podem ter a oportunidade de ajudar a comunidade e  auxiliar no desenvolvimento da população menos favorecida.</p>
            <p>Ao apadrinhar uma criança você não ajuda apenas ela, mas toda a sua família.</p>
            <p>São muitos vulneráveis a pobreza, e nós fazemos o elo entre as organizações e as
             famílas promovendo as doações de forma justa  e colaborativa permitindo que pessoas físicas e Jurídicas possam contribuir para uma Sociedade melhor.</p>
            </span>
            </div>
            </div>

        <div class="sobre-dado">
            <div class="sobre-item">  
                <img class="group-icon" src="image/icon/praticidade.svg" alt="">
                <h3 class="t-icon">Praticidade<br/></h3>
                <p>Ferramenta fácil para começar e contribuir.<br/>Te auxiliamos com a pesquisa basta clicar</p>
            </div>
            <div class="sobre-item">
                <img class="group-icon" src="image/icon/confianca.svg" alt="">           
                <h3 class="t-icon">Confiança</h3>
                <p >As organizações recomendadas são analisadas rigorosamente</p>
            </div>

            <div class="sobre-item">
                <img class="group-icon"  src="image/icon/acompanhamento.svg" alt="">
                <h3 class="t-icon">Acompanhamento</h3>
                <p>Você escolhe e acompanha do início ao fim a sua doação</p>
            </div>
            <div class="sobre-item">
                <img class="group-icon" src="image/icon/segurança.svg" alt="">

                <h3 class="t-icon">Segurança</h3>
                <p>Oportunidade de conhecer a organização a quem se propõe a doar e o seu projeto com a família</p>
            </div>

        </div>

</section>

<section class="porque-doar" id="pdoar">
<div class="p-doar">

<div class="altura-doar">
            <h2>POR QUE DOAR</h2>
        </div>
            <div class="sep-item"></div>

            <div class="textos-item">
                <p >A doação é um ato amoroso que envolve questões pessoais, religiosas e culturais entre outras. Mas uma coisa é certa: a doação estimula fortemente o hábito 
                    e o sentido de ajudar o próximo.</p>
                <p> <span class="rem-mbile"> Dados de uma pesquisa realizada pelo IBGE, apontam que o Brasil tem cerca de 13,4 milhões de pessoas em situação de pobreza extrema. Neste contexto, as crianças de até 14 anos constituem 42,4%, ou seja, grande parte da população.</span></p>
                <p> <span class="rem-mbile"> Aprofundando a investigação, o IBGE chegou à dados que demonstram quais as regiões do país possuem os maiores índice de pobreza. Enquanto a média nacional no conceito pobreza extrema é de 25,4%, 15 estados superam este indicador (todos localizados nas regiões Norte e Nordeste).</span></p>
            </div>

              <div class="info-text">
                <h3 class="info-sobre">Está pronto para ajudar uma criança ?</h3>
                <div class="btn-info-geral">
                    <div class="alt-form"></div>
                    <a href="login.php"> <button class="button-menu-form" type="submit">APADRINHE AGORA MESMO</button> </a>
              </div>
                </div>   
</div>

</section>

<section  id="doar">
    <a name="cdoar"></a>
    <div class="titulo">
        <h2>COMO DOAR</h2>
        <div class="sep-item"></div>
    </div>

    <div class="textos-item">
        <p>Acreditamos que a solidariedade é a engrenagem que move o ser humano a doar o melhor de si em prol do outro, fazendo com que brinquedos e roupas despertem sorrisos e alimentem sonhos.</p>
            <p>É muito Simples  realizar as doações basta apenas clicar no campo cadastro.  Neste formulário você seleciona  o local o qual deseja doar e a criança o qual deseja presentear.</p>
    </div>

    <div class="textos-item-doar">
      <div class="texto">
        <h3 class="text-sub dado-sub">É importante saber:</h3>
            <h3 class="text-sub">O que doar?</h3>
                <p><strong class="text-sub">Roupas</strong> - todos os cadastros das criança possuem os dados de tamanho dos vestuários  e calçado.</p>
                <p><strong class="text-sub">Briquedos</strong> -  as crianças sugerem o brinquedo que gostariam de receber. </p>
                <p><strong class="text-sub">Material Escolar </strong>-  são pré definidos os itens dos kits , como descrito abaixo </p>
            </div>
            <div class="image-kit-crianca">
                <img class=" " src="image/criancas-material.svg">
            </div>
    </div>

 
    <div class="textos-item-doar">

  

        <div class="kit-1">
        <h3>KIT SIMPLES</h3>
            <ul class="kit">        
                <li>3 Cadernos capa dura com 160 folhas</li>
                <li>1 apontador</li>
                <li>2 borrachas</li>
                <li>3 lápis de escrita HB</li>
                <li>1 Caixa de lápis de cor -12 uni</li>
                <li>1 Caixa de canetinha hidrográfica-12 uni</li>
                <li>1 tesoura sem ponta</li>
                <li>1 cola bastão</li>
            </ul>     
         </div>
       
        <div class="kit">
            <h3>KIT COMPLETO</h3>
            <ul >        
                <li>6 Cadernos capa dura com 160 folhas</li>
                <li>1 apontador</li>
                <li>2 borrachas</li>
                <li>3 lápis de escrita HB</li>
                <li>1 Caixa de lápis de cor -12 uni</li>
                <li>1 Caixa de canetinha hidrográfica-12 uni</li>
                <li>1 Caixa de giz de cera -12 unidades</li>
                <li>1 estojo para lapis </li>
                <li>1 mochila escolar</li>
                <li>1 tesoura sem ponta</li>
                <li>1 cola bastão</li>
            </ul>      
        </div>
        <div class="image-kit-crianca">
        <img class=" " src="image/kit.svg">
        </div>
     </div>
    <div class="textos-item-doar">
       <h3 class="text-sub">Quem recebe as doações</h3>
        <div class="info-text">
            <p >Organizações Sociais cadastradas que possuam CNPJ, que prestam serviços totalmente gratuitos e estão inscritas nos Conselhos Municipais de Direito do seu município como: Conselho Municipal da Assistência Social, Conselho Municipal da Criança e do Adolescente, Conselho Municipal da Pessoa com Deficiência e Igrejas.</p>
            <div class="btn-info-geral doar-button">
                <a href="login.html"> <button class="button-menu-form  doar-button" type="submit">APADRINHE AGORA</button> </a>
             </div>
        </div>   
    </div>
</div>
</section>

<section class="taxas" id="taxas">
    <a name="servico"></a>
<div class="p-doar">
<div class="altura-doar">
            <h2>SEM TAXAS SOBRE OS SERVIÇOS</h2>
        </div>
            <div class="sep-item"></div>

            <div class="textos-item">
                <p>Não é cobrado nenhum custo das organizações , apenas no ato da doação será cobrado o custo para manter a ferramenta no ar, para que a mesma possa continuar sendo uma ponte entre os doadores e as organizações.</p>
                 <img class=" img-taxa" src="image/crianca-presente.svg"/>
             
            </div>
               
              <div class="info-text">         
                <div class="btn-info-geral">
                    <div class="alt-form"></div>
                    <a href="login.php">  <button class="button-menu-form" type="submit">CADASTRE AGORA</button> </a>
              </div>
                </div>   
</div>

</section>


<section class="fale-conosco"id="contato">

    <div class="sobre-info"> <a name="fale-conosco"></a>

        <h2>FALE CONOSCO</h2>

        <div class="sep-item"></div>

     </div>

    <div class="sobre-dado-fale">


        <div class="sobre-item-fale">
            <form  class="textos-item" method="POST" action="php/controle-site/cadastro.php">
                <input type="text" class=" form-control"  name="nome" placeholder="Nome" value="<?php echo isset($_SESSION['dados_form']['nome'])?$_SESSION['dados_form']['nome']:"";?>" required />  
                <p><?php echo isset($_SESSION['mensagens_form']['nome'])?$_SESSION['mensagens_form']['nome']:""; ?></p>
                 <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo isset($_SESSION['dados_form']['email'])?$_SESSION['dados_form']['email']:"";?>" required />  
                 <p><?php echo isset($_SESSION['mensagens_form']['email'])?$_SESSION['mensagens_form']['email']:""; ?></p>
                 <input type="text" class="form-control" name="telefone"onKeyPress="MascaraGenerica(this, 'TELEFONE');" placeholder="Telefone" value="<?php echo isset($_SESSION['dados_form']['telefone'])?$_SESSION['dados_form']['telefone']:"";?>" required /> 
                 <p><?php echo isset($_SESSION['mensagens_form']['telefone'])?$_SESSION['mensagens_form']['telefone']:""; ?></p>
              
                  <textarea id="subject" class="form-control" name="mensagem" type="mensagem" name="subject" placeholder="<?php echo isset($_SESSION['dados_form']['mensagem'])?$_SESSION['dados_form']['mensagem']:"Mensagem";?>"  style="height:200px"></textarea>
                  <p><?php echo isset($_SESSION['mensagens_form']['mensagem'])?$_SESSION['mensagens_form']['mensagem']:""; ?></p>
                <input class="button-menu-form" type="submit" name="btnEnviarmensagem" value="ENVIAR MENSAGEM">
                <p><?php if(isset($_SESSION['mensagem'])){echo$_SESSION['mensagem'];};?></p>
                </form>
          
        </div>

        <div class="sobre-item-fale">

            <div class=" textos-item-form">
            <p>Já é padrinho? </p>
                <p>Quer apadrinhar?</p> 
                <p>Whatsapp: 00 0000 00000</p>
                <p>E-mail: comunicacao@apadrinhe.org.br</p>
            </div>
            <div class="dado-button-fale">
                <a href="login.php">  <input class="button-menu-form" type="submit" value="APADRINHE AGORA"></a>
            </div>
        
        </div>

       
    </div>

</section>



<section class="newsletter " id="newsletter">
    <a name="newsletter"></a>
<div class="p-doar">
<div class="altura-doar">
            <h2>AINDA NÃO ESTÁ PRONTO PARA DOAR?</h2>
        </div>
            <div class="sep-item"></div>

            <div class="textos-item-newsletter ">
                <p>Deixe seu e-mail e receba novidades dos projetos</p>
            
            </div>
               
            <div class="sobre-item-fale ">
                <form  class="textos-item dado-newsletter" method="POST" action="php/controle-site/cadastro.php">
                    <input type="text" class="form-control" name="email" placeholder="Email" required />
                    <p><?php echo isset($_SESSION['mensagens_form']['email'])?$_SESSION['mensagens_form']['email']:""; ?></p>
                      <input class="button-menu-form" type="submit" name="btnCadastrarEmail" value="ENVIAR E-MAIL">
                      <p><?php if(isset($_SESSION['mensagem'])){echo$_SESSION['mensagem'];};?></p>
                    </form>
              
            </div>
</div>

</section>



<footer >
    <div class="sobre-dado-footer">

        <div class="sobre-item-footer">
            <h3 class="t-icon-footer">QUEM SOMOS</h3>
            <ul>
                <li class="item "><a href="#sobre">Sobre Nós</a></li>
            </ul>

        </div>

        <div class="sobre-item-footer">
            <h3 class="t-icon-footer">DOAÇÕES</h3>

            <ul>
                <li class="item footer-itens"><a href="#pdoar">Porque-doar</a></li>
                <li class="item footer-itens"><a href="#doar">Como doar?</a></li>
                <li class="item footer-itens"><a href="cadastro-pessoa-juridica.html">Doação Empresa</a></li>
                <li class="item footer-itens"><a href="cadastro-pessoa-fisica.html">Doação Pessoa Física</a></li>
            </ul>
        </div>

        <div class="sobre-item-footer">
            <h3 class="t-icon-footer">CONTATO</h3>
            <ul>
                <li class="item footer-itens"><a href="#contato">Fale Conosco</a></li>
                <li class="item footer-itens"><a href="#newsletter">Newsletter</a></li>
                <li class="item footer-itens"><a href="#taxas">Taxa de Serviços</a></li>
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