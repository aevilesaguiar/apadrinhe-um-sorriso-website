-<?php include "php/sessao.php"?>;
<!DOCTYPE html>
<html lang="pt-br">
<head>
@ -35,7 +34,7 @@
src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
crossorigin="anonymous"></script>

<script src="js/mask.js"></script>

<script>
$(function() {
@ -97,42 +96,42 @@ $(".toggle").on("click", function() {
            
                  <img class="img-direc-login " src="image/logo-contato.svg" alt="" style="margin: 0 auto; margin-top: 50px;"  >
                  <div class="dist-menu-botao"></div>
                    <form action="PHP/valida-entrada-usuario.php" method="POST">
                    <form action="">
                        <div class="mb-3 row">
                            <input type="text" name= "usuario" class="form-control" id="inputAddress" placeholder="Usuario">
                            <input type="text" class="form-control" id="inputAddress" placeholder="Usuario">
                          </div>
            
                          <div class="mb-3 row">
                            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Digite uma senha">
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Digite uma senha">
                          </div>

                            <input class="button-menu-form" type="submit" value="ENTRAR">


                    </form>

                      
                <ul class="login-utils">
                    
                <div class="dist-menu-botao"></div>
                <div class="dist-menu-botao" style="height: 20px;"></div>

                    <li class="margin-bottom-8 margin-top-8">
                        <span class="text1">
                             <b><?php if(isset($_SESSION['mensagem'])){echo$_SESSION['mensagem'];};?><br/></b><!--Aeviles, por favor verificar-->
                        </span>
                        <span class="text1">
                       <p style="height: 30px;"> <span class="text1">
                            Esqueceu sua
                        </span>

                        <a href="lembrar-senha.php" class="text2">
                            senha?
                        </a>
                        </a></p>
                    </li>
                    <li>
                    <li><p>
                        <span class="text1">
                            E-mail de ativação
                        </span>

                        <a href="redefinir-senha.php" class="text2">
                            não chegou?
                        </a>
                        </a></p>
                    </li>
                    <div class="tit-log">
                    <p >Cadastrar novo Usuário:</p>
@ @@