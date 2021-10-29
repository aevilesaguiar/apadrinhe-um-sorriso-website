<?php 
 //include 'php/controle-organizacao/conexao-banco-org.php';
 include '../geral/conexao-banco.php';
 include '../controle-site/redirecionamento-pagina.php';
 include 'sessao-org.php';
 include '../controle-site/mensagens.php';
 include '../controle-site/funcoes-sistema.php';

if(isset($_GET['codigo'])){
 $perfil = 'SELECT * FROM perfil where id_cadastro="'.$_GET['codigo'].'"';
 $perfil = mysqli_query($conecta,$perfil);
 foreach($perfil as $tipo_cadastro){

}
}else if(isset($_POST['codigo'])){
   $perfil = 'SELECT * FROM perfil where id_cadastro="'.$_POST['codigo'].'"';
 $perfil = mysqli_query($conecta,$perfil);
 foreach($perfil as $tipo_cadastro){

}
}

 

 if(isset($_GET['btnAprovar'])==1){

 $id_cadastro_aprovacao = $_GET['codigo']; 

 $search = "UPDATE perfil SET status_cadastro = 'OK' WHERE id_cadastro = '$id_cadastro_aprovacao'";
 $result_search = mysqli_query($conecta, $search);

 

 if($tipo_cadastro['tipo_cadastro']=="doador_pj"){
   redireciona_get(16,$id_cadastro_aprovacao);
 }else if($tipo_cadastro['tipo_cadastro']=="doador_pf"){
   redireciona_get(18,$id_cadastro_aprovacao);
   
 }
   sessao_mensagem(mensagem(28));

 }else if(isset($_POST['btnReprovar'])){
    $id_cadastro_aprovacao = $_POST['codigo'];
    $search = "UPDATE perfil SET status_cadastro = 'RP' WHERE id_cadastro = '$id_cadastro_aprovacao'";
 $result_search = mysqli_query($conecta, $search);

    $search = 'INSERT mensagem_sistema(status_sistema,mensagem) values("PENDENTE","'.$_POST['mensagem'].'")';
 $result_search = mysqli_query($conecta, $search);

 
 echo $tipo_cadastro['tipo_cadastro'];
 $id_mensagem = mysqli_insert_id($conecta);

 $search = 'INSERT perfil_exibe(fk_id_mensagem,fk_id_cadastro) values("'.$id_mensagem .'","'.$_POST['codigo'].'")';
 $result_search = mysqli_query($conecta, $search);
 
 if($tipo_cadastro['tipo_cadastro']=="doador_pj"){
   redireciona_get(16,$id_cadastro_aprovacao);
 }else if($tipo_cadastro['tipo_cadastro']=="doador_pf"){
   redireciona_get(18,$id_cadastro_aprovacao);
   
 }

 sessao_mensagem(mensagem(29));

 }else if(isset($_POST['btnResolvido'])){ 
    $id_cadastro_aprovacao = $_GET['codigo']; 
    $search = 'UPDATE mensagem_sistema SET status_sistema="FINALIZADO" WHERE id_mensagem="'.$_GET['id_mensagem'].'"';
    $result_search = mysqli_query($conecta, $search);

    $search = 'SELECT ms.status_sistema FROM mensagem_sistema ms
                              INNER JOIN perfil_exibe pe on pe.fk_id_mensagem=ms.id_mensagem WHERE ms.status_sistema="PENDENTE"';
      $result_search = $conecta->query($search);

      //Se não exitir mais mensagens referente ao cadastro do doador, o cadastro é aprovado.
      if($conta=$result_search->num_rows==0){
         $search = "UPDATE perfil SET status_cadastro = 'OK' WHERE id_cadastro = '$id_cadastro_aprovacao'";
         $result_search = mysqli_query($conecta, $search);

         if($tipo_cadastro['tipo_cadastro']=="doador_pj"){
            redireciona_get(16,$id_cadastro_aprovacao);
          }else if($tipo_cadastro['tipo_cadastro']=="doador_pf"){
            redireciona_get(18,$id_cadastro_aprovacao);
            
          }
         sessao_mensagem(mensagem(28));

      }else{

         if($tipo_cadastro['tipo_cadastro']=="doador_pj"){
            redireciona_get(16,$id_cadastro_aprovacao);
          }else if($tipo_cadastro['tipo_cadastro']=="doador_pf"){
            redireciona_get(18,$id_cadastro_aprovacao);
            
          }
      sessao_mensagem(mensagem(30));

      }
 }else if(isset($_GET['btnAprovarDoacao'])){

        $data=data_hora();
        $search = 'UPDATE doacao SET status_doacao = "PENDENTE",data_hora_recebimento ="'.$data.'" WHERE  id_doacao = "'.$_GET['btnAprovarDoacao'].'"';
        $result_search = mysqli_query($conecta, $search);
        redireciona(16);
        sessao_mensagem(mensagem(31));
 }else if(isset($_POST['btnReprovarDoacao'])){
    $id_doacao = $_POST['codigo'];
    $search = "UPDATE doacao SET status_doacao = 'REPROVADO' WHERE id_doacao = '$id_doacao'";
 $result_search = mysqli_query($conecta, $search);

    $search = 'INSERT mensagem_sistema(status_sistema,mensagem) values("PENDENTE","'.$_POST['mensagem'].'")';
 $result_search = mysqli_query($conecta, $search);

 
 
 $id_mensagem = mysqli_insert_id($conecta);

 $search = 'INSERT doa_exibe(fk_id_doacao,fk_id_mensagem) values("'.$_POST['codigo'].'","'.$id_mensagem .'")';
 $result_search = mysqli_query($conecta, $search);
 

    redireciona_get(19,$id_doacao); // Função retorna pagina com código da doação
    sessao_mensagem(mensagem(32));

 }else if(isset($_POST['btnResolvidoDoacao'])){
  $id_doacao = $_POST['id_doacao']; 

  echo $_POST['id_doacao']." ".$_POST['id_mensagem'];
  $search = 'UPDATE mensagem_sistema SET status_sistema="FINALIZADO" WHERE id_mensagem="'.$_POST['id_mensagem'].'"';
  $result_search = mysqli_query($conecta, $search);

  $search = 'SELECT ms.status_sistema FROM mensagem_sistema ms
                            INNER JOIN doa_exibe pe on pe.fk_id_mensagem=ms.id_mensagem WHERE ms.status_sistema="FINALIZADO" AND pe.fk_id_doacao="'.$id_doacao.'"';
    $result_search = $conecta->query($search);

    //Se não exitir mais mensagens referente ao cadastro do doador, o cadastro é aprovado.
    if($conta=$result_search->num_rows==0){
       $search = "UPDATE doacao SET status_doacao = 'PENDENTE' WHERE id_doacao = '$id_doacao'";
       $result_search = mysqli_query($conecta, $search);

       $data=data_hora();
      $search = 'UPDATE doacao SET status_doacao = "PENDENTE",data_hora_recebimento ="'.$data.'" WHERE  id_doacao = "'.$id_doacao.'"';

       
      redireciona(16);
      sessao_mensagem(mensagem(31));

    }else{
          redireciona_get(19,$id_doacao);
          sessao_mensagem(mensagem(33));
    }
}else if($_POST['btnCadastraEntrega']){
  
  $termo_arq = $_FILES['termo_arq'];
  echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
  
    if($termo_arq !==null) {

        preg_match("/\.(pdf|jpeg|png|jpg){1}$/i", $termo_arq["name"], $ext);
        //gera um nome ramdomico para a imagem

            if ($ext == true) {

            $nome_arq = md5(uniqid(time())) . "." . $ext[1];

            $path_arq = "documentos/" . $nome_arq;

            move_uploaded_file($termo_arq["tmp_name"], $path_arq);


        }
    }
    $nome_arq=explode("/",$path_arq);
    $data=data_hora();
    $id_doacao=$_POST['id_doacao'];

    $altera = 'UPDATE doacao SET status_doacao = "FINALIZADO",data_hora_entrega="'.$data.'",doc_confirmacao="'.$nome_arq[1].'" WHERE id_doacao="'.$id_doacao.'"';
    $resultado=mysqli_query($conecta, $altera);

    redireciona(17);
    sessao_mensagem(mensagem(34));


}

?>