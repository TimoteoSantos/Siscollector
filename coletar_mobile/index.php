  <?php
  session_start();
  require '../coletor/arquivos_banco/conexao.php';
  
  ?>

  <!DOCTYPE html>

  <html lang="pt-br">
  <head>
	<!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="./index_files/jquery.min.js.download"></script>
        <script src="./index_files/bootstrap.min.js.download"></script>
       <?php  require_once 'index_files/funcaoEnter.js' ?>

  		<script type="text/javascript">
  		
  		</script>

  
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

              <input type="number" name="ref" value="<?= $_GET['codigo'] ?>" class="form-control inputUnico" id="exampleInputEmail1" placeholder="Barras" required="" autofocus="" autocomplete="off">


              <input type="number" name="qt" class="form-control inputUnico" id="exampleInputEmail1" required="" onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true" min="1"  >

              </div>

              <input type="submit" class="btn btn-primary enviar" value="Enviar">
           
            </form>
            
          </div>
        </div>
        
        <div>

        <span class="camera">
        
      		<?php

      		$listagem = mysqli_query($conexao,  "SELECT  max(camera) as camera FROM config limit 1"); 
      		while($linha = mysqli_fetch_array($listagem)) {

      		$destino = $linha["camera"];                  
      		//$destino = "192.168.1.1"; //destino manualmente

    	    ?>

	        <a href="http://zxing.appspot.com/scan?ret=http://<?php echo $destino ?>/coletar_mobile/index.php?codigo={CODE}"> <?php  } ?>
  
        		<img src="camera.jpg" height="60" class="lado">

        		<h2><?php// echo $destino;?> </h2>
        		
    		</a>

    	</span>
        
        <!-- excluir ultimo -->
        <span class="camera">

        <?php 

      $usuario = $_SESSION['usuario'];

      //coloca em listagem um array com apenas os campos vazios de status
      $listage = mysqli_query($conexao,"SELECT max(id) as id from coletor_importar  where usuario = '$usuario' limit 1;");

      while($linh = mysqli_fetch_array($listage)) {
      
        $id2 = $linh['id'];

      }

      $listagem = mysqli_query($conexao,"SELECT id, referencia, quantidade, descricao from coletor_importar  where usuario = '$usuario' and id= '$id2' limit 1;");



      while($linha = mysqli_fetch_array($listagem)) {
  
      ?>

      <span type="hidden" onclick="start()">
      
           <a class="branco" href="arquivos_banco/excluir_ultimo.php?referencia=<?= $linha['referencia'] ?>&id=<?= $linha['id'] ?>&descricao=<?= $linha['descricao'] ?>&quantidade=<?= $linha['quantidade'] ?>"  onclick="return confirm('Excluir?')">
             </span>

               <img src="excluir.jpg" height="55" class="lado">

            </a>

      
      <?php } ?>


      </div>

</span>


<!-- inicio da lista de produtos coletados -->

<span class="camera">

<?php 

$usuario = $_SESSION['usuario'];

    //coloca em listagem um array com apenas os campos vazios de status
    $listagem = mysqli_query($conexao,"SELECT max(id) as id, referencia, sum(quantidade), descricao from coletor_importar  where usuario = '$usuario' group by referencia order by id desc limit 2;");

   while($linha = mysqli_fetch_array($listagem)) {

?>

      <div  class="clear"> D:<?php echo  utf8_encode($linha['descricao']) ; ?> | <span style='color:red !important';>QT:<?php echo $linha['sum(quantidade)']; ?></span> |REF: <?php echo $linha['referencia'] ?> <p></div>



<?php } ?>
      

        </div>
    </span>


    </div> <!-- /container -->

           </body>

      </html>