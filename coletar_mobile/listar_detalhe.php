  <?php
  session_start();
  require '../coletor/arquivos_banco/conexao.php';

  $referencia = $_GET['referencia'];
 
  ?>

  <!DOCTYPE html>

  <html lang="pt-br">
  <head>

     <script type="text/javascript">
 
             function start() {
                 // Faz o dispositivo vibrar por 2000 milisegundos
                 window.navigator.vibrate(200);
             }
 
        </script>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Siscolect Mobi</title>

    <!-- Bootstrap core CSS -->
    <link href="./index_files/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./index_files/css.css" rel="stylesheet">

  </head>

  <body>

    <?php
    require 'cabecalho.php';
    ?>
    
    <?php 

    $usuario = $_SESSION['usuario'];

     if ($sessao == 0){

    //coloca em listagem um array com apenas os campos vazios de status
    $listagem = mysqli_query($conexao,"SELECT id, referencia,quantidade, descricao, usuario, hora, local_estoque, local_loja from coletor_importar   where referencia = '$referencia' and usuario = '$usuario' order by id desc;");
}else{

    //coloca em listagem um array com apenas os campos vazios de status
    $listagem = mysqli_query($conexao,"SELECT id, referencia,quantidade, descricao, usuario, hora, local_estoque, local_loja from coletor_importar   where referencia = '$referencia' and usuario = '$usuario' and chave_sessao = $sessao order by id desc;");

}


    
        ?>
}

    <div class="container" id="topo">

      <table class="table table-hover"> 

        <?php
        while($linha = mysqli_fetch_array($listagem)) {


        	$imprimir_valor = '';

        	if ($linha['local_estoque'] == 1) {
    	
    	$imprimir_valor = "Estoque";
    }

    if ($linha['local_loja'] == 1) {
    	
    	$imprimir_valor = "Loja";
    }


          ?>
          <!-- primeiro produto -->
          <tr>
            <td><?= $linha['referencia'] ?> </td>
            <td><?= $linha['quantidade'] ?></td>
          </tr>

          <tr>

            <td class="descricao" colspan="2"><?= utf8_encode($linha['descricao']); ?> <br /> <?= $linha['hora'] ?> <?php echo" | " .$imprimir_valor; ?></td>
            

       </tr>
       <!-- fim produto -->

       <?php 
     }

     ?>

   </table>


<?php 

    $usuario = $_SESSION['usuario'];
    //coloca em listagem um array com apenas os campos vazios de status
    $lista = mysqli_query($conexao,"SELECT usuario, quantidade from coletor_importar   where referencia = '$referencia' and usuario != '$usuario' group by usuario;");
    
        ?>

<h4 align="center">Também Coletaram</h4>
<hr />


<table>
  

<?php
        while($varrer = mysqli_fetch_array($lista)) { ?>


  <tr align="center">
    
   <td><?php echo $varrer['usuario']; echo " | "; ?> </td>
    <td> <?= $varrer['quantidade'] ?> </td> 
    
  </tr>

</table>

     <?php 
     }

     ?>






  <a href="#topo">
  <button type="button" class="btn btn-success botao">Topo</button>
  </a>

 </div> <!-- /container -->

      <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="./index_files/jquery.min.js.download"></script>
        <script src="./index_files/bootstrap.min.js.download"></script>

      </body>
      </html>