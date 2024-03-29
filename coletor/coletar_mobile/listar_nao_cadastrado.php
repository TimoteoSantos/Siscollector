  <?php
  session_start();
  require '../coletor/arquivos_banco/conexao.php';
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

    //coloca em listagem um array com apenas os campos vazios de status
    $listagem = mysqli_query($conexao,"SELECT max(id) as id, referencia, sum(quantidade), descricao from coletor_importar  where usuario = '$usuario' and descricao = 'produto nao cadastrado' group by referencia order by id desc limit 200;");


    ?>

    <div class="container" id="topo">

      <table class="table table-hover"> 


        <?php
        while($linha = mysqli_fetch_array($listagem)) {
          ?>

                         <!-- primeiro produto -->
          <tr>

          
          
            <td><a style='color:black; !important;' href="listar_detalhe.php?referencia=<?= $linha['referencia'] ?>"><?= $linha['referencia'] ?></a></td>
        
            <td><a style='color:black; !important;' href="listar_detalhe.php?referencia=<?= $linha['referencia'] ?>"><?= $linha['sum(quantidade)'] ?></a></td>

          </tr>

          <tr>

            <td class="descricao"><a style='color:black; !important;' href="listar_detalhe.php?referencia=<?= $linha['referencia'] ?>"><?= utf8_encode($linha['descricao']); ?> </a></td>
                   
          
             <td><button class="btn btn-warning" type="submit" onclick="start()">
              <a class="branco" href="arquivos_banco/excluir_produto_nao_cadastrado.php?referencia=<?= $linha['referencia'] ?>&descricao=<?= $linha['descricao'] ?>&quantidade=<?= $linha['sum(quantidade)'] ?>"  onclick="return confirm('Excluir?')">
             Excluir</button>
           

         </td>

       </tr>
</a>
       <!-- fim produto -->

       <?php 

     }

     ?>

   </table>

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