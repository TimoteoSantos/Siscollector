<?php
session_start();
require 'arquivos_banco/login_verificar.php';
require 'arquivos_banco/conexao.php';
 ?>

<!DOCTYPE html>
<html>

<head>

  <?php

  $listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_importar");
  //conta
  $contar = $listagem->fetch_row();
  //recebe o valor
  $id = $contar;
  //se nao tiver importado
  if ($id[0] < 1 ) { 
  //envia mensagem
  $_SESSION['msg'] = "<div class='alert alert-danger'> <span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não há o que baixar!</div>";
  header("Location: v_baixar_integracao.php");
  }

  //select
  $querymai = mysqli_query($conexao, "select referencia, quantidade, descricao, usuario from coletor_importar");
  
  //abre para leitura e apaga os dados armazenados anteriormente se nao colocar ele duplica "w+"
  fopen("arquivo/Arquivo_integrar.txt", "w+");
  
  //percorre todos os campos recebidos
  while($data = mysqli_fetch_array($querymai)) {
  
  //coloca os valores nas variaveis
   $log = "$data[referencia];$data[quantidade];$data[descricao];$data[usuario]\r\n"; echo "<p>";
  
  //se receber o arquivo
  if (!$savelog = fopen('arquivo/Arquivo_integrar.txt', "a")) 
  
  { exit; }        
  
  if (!fwrite($savelog, $log))
  
  { exit; fclose($savelog); }
  
  }
  
  ?>

  <title>coletor de dados</title>
  <!-- link para os css-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css.css">
 <link rel="stylesheet" href="normalize.css">

</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">

   <?php require 'v_cabecalho.php'; ?>

   <section class="corpo">				


    <!-- header painel com a imagem -->

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Baixar arquivo integração</h1>
        <p class="lead">Baixar arquivo coletados na pasta dowloand</p>
      </div>
    </div>
    <!-- fim da header -->

    <!-- inicio do painel baixar como txt -->

    <p>   
      <div class="panel panel-primary">
        <div class="panel-heading">baixar arquivo coletados</div>
        <div class="panel-body">
         <div class="form-group">
          <!--link para baixar arquivo como txt-->
          <span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
          <a href="arquivo/Arquivo_integrar.txt" download="arquivo/Arquivo_integrar.txt" id="link">Baixar Arquivo</a>        </div>
        </div>
      </div> <!-- fim do painel baixar como txt-->

    </section> <!-- dim da sessao corpo-->

  </section><!-- fim da sessao principal-->

</body>
</html>