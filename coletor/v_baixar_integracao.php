<?php
session_start();
//conexao com banco
require 'arquivos_banco/conexao.php';
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
  <?php	require 'v_cabecalho.php';?>

  <section class="corpo">	

    <!-- header painel com a imagem -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Integrar servidores</h1>
        <p class="lead">Baixar arquivos para integração entre servidore</p>
      </div>
    </div>
    <!-- fim da header -->

    <?php require 'arquivos_banco/mensagens.php'; //mensagens de aviso ?>

    <!-- inicio do painel baixar como txt coletados-->
    <p>   
      <div class="panel panel-primary">
        <div class="panel-heading">Baixar arquivo como coletados para a pasta dowloand</div>
        <div class="panel-body">
          <div class="form-group">
           <!--link para baixar arquivo como txt--> 
           <a href="v_baixar_coletados_dowloand.php">

             <span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
           Baixar integracao</a>
         </div>
       </div>
     </div> <!-- fim do painel baixar como txt coletados-->

     <!-- inicio do painel baixar  usuarios -->
     <p>
      <div class="panel panel-primary">
        <div class="panel-heading">Baixar usuários</div>
        <div class="panel-body">
          <div class="form-group">
            <!--link para baixar arquivo usuarios--> 
            <a href="v_baixar_usuarios_dowloand.php">

             <span class="glyphicon glyphicon-floppy-save  icones" aria-hidden="true"></span>
           Baixar usuários</a>
         </div>
       </div>
     </div> <!-- fim do painel baixar como csv-->

     <hr>

     <!-- inicio do painel baixar como txt no servidor -->
     <p>   

      <div class="panel panel-danger">
       <div class="panel-heading">Baixar arquivo como .txt na pasta util do servidor</div>
       <div class="panel-body">
        <div class="form-group">
          <!--link para baixar arquivo como .csv--> 
          <a href="arquivos_banco/baixar_integracao.php">

           <span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
         Baixar coleta e usuários .txt</a>
       </div>
     </div>
   </div> <!-- fim do painel baixar como txt no servidor-->

   <!-- inicio do painel -->

   <p>   
    <div class="panel panel-primary">
      <div class="panel-heading">baixar arquivo coletados atomaticamente</div>
      <div class="panel-body">
       <div class="form-group">
        <!--link para baixar arquivo como txt-->
        <span class="glyphicon glyphicon-refresh icones" aria-hidden="true"></span>

        <a href="arquivos_banco/baixar_novo_automatico.php" target="blank">Iniciar</a>        </div>

      </div>
    </div> <!-- fim do painel baixar como txt-->

  </section> <!-- dim da sessao corpo-->
</section><!-- fim da sessao principal-->

</body>
</html>