<?php
  //inicia a sessao
session_start();
  //conexao com banco

require '../coletor/arquivos_banco/login_verificar.php';

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

    <section class="corpo">

      <!-- header painel com a imagem -->
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Erro !!</h1>
          <p class="lead">Você precisa configurar o sistema para começar a ultilizar sessão !</p>
        </div>
      </div>
      <!-- fim da header -->

      <?php //require //'arquivos_banco/mensagens.php'; //mensagens de aviso ?>

       <!-- inicio do painel nao cadastrado -->
       <p>   
        <div class="panel  panel-danger panel-lang">
          <div class="panel-heading">
              <span class="glyphicon glyphicon glyphicon-fire" aria-hidden="true"></span>
              Click no link abaixo e configure o coletor para uso de sessão</div>
          <div class="panel-body">
           <div class="form-group">
            <!--link para baixar arquivo como .csv--> 
            <a href="../coletor/v_configuracao.php">

             <span class="glyphicon glyphicon-open icones" aria-hidden="true"></span>
           Configurar sessão</a>
         </div>
       </div>
     </div> <!-- fim do painel nao cadastrado-->

    </section><!-- dim da sessao corpo-->
  </section><!-- fim da sessao principal-->

</body>
</html>