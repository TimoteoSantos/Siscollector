<!DOCTYPE html>

<?php
session_start();

require '../coletor/arquivos_banco/conexao.php';
?>

<html lang="pt-br">
<head>


<style>
.navbar-header  {
  background-color:black !important;
}
</style>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Pesquisa</title>

  <!-- Bootstrap core CSS -->
  <link href="./index_files/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="./index_files/css.css" rel="stylesheet">

</head>

<body>

  <?php require 'cabecalho.php' ?>
  
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
      
      <form action="pesquisar_coleta.php" method="post">
        <div class="form-group">

        <input type="text" name="ref" class="form-control perquisar" id="exampleInputEmail1" placeholder="Barras" required="" autofocus="" autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary botao2" >Buscar </button>
      </form>
  

<p>
   
      

        </div>


</div>

</div> <!-- /container -->


    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="./index_files/jquery.min.js.download"></script>
      <script src="./index_files/bootstrap.min.js.download"></script>

    </body>
  </html>