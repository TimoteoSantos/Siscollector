<?php
   session_start();
   require '../coletor/arquivos_banco/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <!-- Bootstrap core JavaScript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="./index_files/jquery.min.js.download"></script>
      <script src="./index_files/bootstrap.min.js.download"></script>
      <?php  require_once 'index_files/funcaoEnter.js' ?>
      <script type="text/javascript"></script>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Siscollector Mobi</title>
      <!-- Bootstrap core CSS -->
      <link href="./index_files/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="./index_files/css.css" rel="stylesheet">
   </head>
   <body>
      <?php //menu
         require 'cabecalho.php';
         ?>
      <div class="container fixo">
         <div class="panel panel-default">
            <div class="panel-body">
               <div class="alert" role="alert">
                  <?php include 'mensagens.php'; ?>
                  <p>
               </div>
                        
         <?php // include 'mostrar_primeiro.php' 
          
            //codigo recebido pelo app barcode
            $codigo = isset($_GET['codigo']);
               
               if ($codigo == 1) {
                  
                  $codigo = $_GET['codigo'];
                  
               }
               
            ?>       

               <form action="arquivos_banco/gravar.php" method="post">
                  <div class="form-group">
                     <input type="number" name="ref" value="<?php echo $codigo; ?>" class="form-control inputUnico" id="exampleInputEmail1" placeholder="Barras" required="" autofocus="" autocomplete="off">
                     <input type="number" name="qt" class="form-control inputUnico" id="exampleInputEmail1" required="" onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true" min="1" max="7000"  >
                  </div>
                  <input type="submit" class="btn btn-info enviar" value="Enviar">
               </form>
            </div>
         </div>
         <div>
            <!-- ler codigo no app  -->
            <span class="camera">
               <?php
                  $listagem = mysqli_query($conexao,  "SELECT  max(camera) as camera FROM config limit 1"); 
                  while($linha = mysqli_fetch_array($listagem)) {
                  
                  $destino = $linha["camera"];                  
                  //$destino = "192.168.1.1"; //destino manualmente
                  
                   ?>
               <a href="http://zxing.appspot.com/scan?ret=http://<?php echo $destino ?>/coletar_mobile/index.php?codigo={CODE}">
                  <?php  } ?>

                  <img src="img/camera.png" height="40" class="lado">

                  <h2><?php// echo $destino;?> </h2>
               </a>
            </span>

            <!-- excluir ultimo -->
            <span class="camera">
               <?php 
                  $usuario = $_SESSION['usuario'];

                  if ($sessao == 0){// se entrou avulso ou nao esta com sessao configurada pode exluir tudo
                  
                  $listage = mysqli_query($conexao,"SELECT max(id) as id from coletor_importar  where usuario = '$usuario' limit 1;");
                  
                  while($linh = mysqli_fetch_array($listage)) {
                  
                    $id2 = $linh['id'];
                  
                  }
                  
                  $listagem = mysqli_query($conexao,"SELECT id, referencia, quantidade, descricao from coletor_importar  where usuario = '$usuario' and id= '$id2' limit 1;");
                  
                  while($linha = mysqli_fetch_array($listagem)) {
                  
                  ?>
               <span type="hidden" onclick="start()">
               <a class="branco" href="arquivos_banco/excluir_ultimo.php?referencia=<?= $linha['referencia'] ?>&id=<?= $linha['id'] ?>&descricao=<?= $linha['descricao'] ?>&quantidade=<?= $linha['quantidade'] ?>"  onclick="return confirm('Excluir o último item?')">
               </span>
               <img src="img/excluir.png" height="40" class="lado">
               </a>

               <?php }}else{ //se escolheu sessao so pode excluir da sessao que entrou

                  //coloca em listagem um array com apenas os campos vazios de status
                  $listage = mysqli_query($conexao,"SELECT max(id) as id from coletor_importar  where usuario = '$usuario' limit 1;");
                  
                  while($linh = mysqli_fetch_array($listage)) {
                  
                    $id2 = $linh['id'];
                  
                  }
                  
                  $listagem = mysqli_query($conexao,"SELECT id, referencia, quantidade, descricao from coletor_importar  where usuario = '$usuario' and chave_sessao = $sessao and id= '$id2' limit 1;");
                  
                  while($linha = mysqli_fetch_array($listagem)) {
                  
                  ?>
               <span type="hidden" onclick="start()">
               <a class="branco" href="arquivos_banco/excluir_ultimo.php?referencia=<?= $linha['referencia'] ?>&id=<?= $linha['id'] ?>&descricao=<?= $linha['descricao'] ?>&quantidade=<?= $linha['quantidade'] ?>"  onclick="return confirm('Excluir o último item?')">
               </span>
               <img src="img/excluir.png" height="40" class="lado">
               </a>

               <?php    
                  
                     }
                  }

               //final do excluir ultimo

                  //contagens
                  $usuario = $_SESSION['usuario'];
                  
                  if ($sessao == 0){//se nao iniciou uma sessao

                  $pesquisa   = mysqli_query($conexao,  "SELECT usuario, COUNT(DISTINCT referencia) from coletor_importar where usuario = '$usuario' group by usuario order by usuario ;");
                  $total_usuario  = $pesquisa->fetch_row();
                  

                  $pesquisa   = mysqli_query($conexao,  "SELECT usuario, COUNT(id) from coletor_importar where usuario = '$usuario' group by usuario order by usuario ;");
                  $total_usuario_2  = $pesquisa->fetch_row();
                  
               }else{//se iniciou uma sessao

                  $pesquisa   = mysqli_query($conexao,  "SELECT usuario, COUNT(DISTINCT referencia) from coletor_importar where usuario = '$usuario' and chave_sessao = $sessao group by usuario order by usuario ;");
                  $total_usuario  = $pesquisa->fetch_row();
                  

                  $pesquisa   = mysqli_query($conexao,  "SELECT usuario, COUNT(id) from coletor_importar where usuario = '$usuario' and chave_sessao = $sessao group by usuario order by usuario ;");
                  $total_usuario_2  = $pesquisa->fetch_row();

               }

               ?>
               <?php  if ($total_usuario > 0) { // mostrar resultado ?>
               <a href="listar.php"> <img src="img/lista.png" height="40" class="lado lado_esquerdo"> </a>
               <!-- total de coleta-->
               <h4 class="lado"><?php  echo $total_usuario[1];?></h4>
               <h3 class="lado afastar"><?php echo $total_usuario_2[1]; ?></h3>
               <?php } ?>
         </div>
         </span>

         <!-- inicio da lista de produtos coletados -->
         <span class="camera">
            <?php 
               $usuario = $_SESSION['usuario'];

                if ($sessao == 0){// mostrar se nao iniciou sessao

                   //coloca em listagem um array com apenas os campos vazios de status
                   $listagem = mysqli_query($conexao,"SELECT max(id) as id, referencia, sum(quantidade), descricao from coletor_importar  where usuario = '$usuario' group by referencia order by id desc limit 4;");
               
                }else{ //mostrar se iniciou sessao

                   //coloca em listagem um array com apenas os campos vazios de status
                   $listagem = mysqli_query($conexao,"SELECT max(id) as id, referencia, sum(quantidade), descricao from coletor_importar  where usuario = '$usuario' and chave_sessao = $sessao group by referencia order by id desc limit 4;");

                }

                  while($linha = mysqli_fetch_array($listagem)) { //mostrar resultado das mercadorias coletadas
               
               ?>
            <div  class="clear " >
               <a style='color:black; !important;' href="listar_detalhe.php?referencia=<?= $linha['referencia'] ?>">
                  D:<?php echo  utf8_encode($linha['descricao']) ; ?> 
                  <span style='color:red !important';>
                  | QT:<?php echo $linha['sum(quantidade)']; ?></span> 
                  | REF: <span style='color:#008080 !important';>
                  <?php echo $linha['referencia'] ?></span>
                  <p></p>
               </a>
            </div>
            <?php } ?>
      </div>
      </span>
      </div> <!-- /container -->
   </body>
</html>