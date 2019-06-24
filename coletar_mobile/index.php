  <?php
  session_start();
  require '../coletor/arquivos_banco/conexao.php';
  ?>

  <!DOCTYPE html>

  <html lang="pt-br">
  <head>
  	 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Siscollect Mobi</title>

    <!-- Bootstrap core CSS -->
    <link href="./index_files/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./index_files/css.css" rel="stylesheet">

  </head>

  <body>
<?php
require 'cabecalho.php';
?>
      <div class="container fixo">

        <div class="panel panel-default">
         
         <div class="panel-body">

          <div class="alert" role="alert">

            <?php

            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
              }
            
            ?>
          </div>

      <form action="arquivos_banco/gravar.php" method="post">
            
            <div class="form-group">

              <input type="number" name="ref" value="<?= $_GET['codigo'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Barras" required="" autofocus="" autocomplete="off">


              <input type="number" name="qt" class="form-control" id="exampleInputEmail1" value="1" required="" autofocus="" autocomplete="off">

              </div>

              <input type="submit" class="btn btn-primary enviar" value="Enviar">
           
            </form>
          </div>
        </div>
        
        <div>
          <?php

      $listagem = mysqli_query($conexao,  "SELECT  max(camera) as camera FROM config limit 1"); 
      while($linha = mysqli_fetch_array($listagem)) {

        $destino = $linha["camera"];                  
        //$destino = "192.168.1.1"; //destino manualmente

        ?>

        <a href="http://zxing.appspot.com/scan?ret=http://<?php echo $destino ?>/coletar_mobile/index.php?codigo={CODE}"> <?php  } ?>
  
        <button class="btn btn-warning camera" type="submit">Câmera</button>

        <h2><?php// echo $destino;?> </h2>

      </div>

      <!-- FIM DA CONFIGURAÇÃO PELA CAMERA-->
      
        </div>

      
      </div> <!-- /container -->

      <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="./index_files/jquery.min.js.download"></script>
        <script src="./index_files/bootstrap.min.js.download"></script>

      </body>

      </html>