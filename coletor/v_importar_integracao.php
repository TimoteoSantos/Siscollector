<?php
session_start();
require 'arquivos_banco/login_verificar.php';
?>

<!DOCTYPE html>
<html>
<head>

	<title>coletor de dados</title>

  <!-- link para os css-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="normalize.css">

</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">

   <?php require 'v_cabecalho.php';  ?>

   <section class="corpo"> <!-- centro da pagina-->

    <!-- header -->

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Importar arquivos</h1>
        <p class="lead">Importar arquivos de integração</p>
      </div>
    </div>
    <!-- fim da header -->

    <?php require 'arquivos_banco/mensagens.php' //mensagens de aviso ?>

    <!--painel -->
    <p>		
      <div class="panel panel-primary">
        <div class="panel-heading">Importar arquivo de integração</div>
        <div class="panel-body">
         <div class="form-group">

          <form action="arquivos_banco/gravar_arquivo_importar_servidor.php" method="post" enctype="multipart/form-data" class="clear">

            <label>

             <span class="glyphicon glyphicon-level-up icones" aria-hidden="true"></span>
           Buscar arquivo</label>


           <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="file" required="">

           <br>

           <input type="submit" value="Enviar" class="btn btn-info">

         </form>

       </div>

     </div>
   </div> <!-- fim do painel-->

   <!--painel -->
   <p>   
    <div class="panel panel-primary">
      <div class="panel-heading">Importar arquivo de usuários</div>
      <div class="panel-body">
       <div class="form-group">

        <form action="arquivos_banco/gravar_usuarios.php" method="post" enctype="multipart/form-data" class="clear">

          <label>

           <span class="glyphicon glyphicon-level-up icones" aria-hidden="true"></span>
         Buscar arquivo</label>

         <input type="file" name="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" value="Escolher arquivo" required="">

         <br>
         <input type="submit" value="Enviar" class="btn btn-info">

       </form>

     </div>

   </div>
 </div> <!-- fim do painel-->

</section><!--FIM DA SESSAO CORPO -- >

</section>

</body>
</html>