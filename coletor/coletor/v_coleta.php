<?php
  //inicia a sessao
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
  	
  	<?php require 'v_cabecalho.php';?>

    <section class="corpo">


      <!-- header painel com a imagem -->
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Gerenciar coleta</h1>
          <p class="lead">Sistema de gerenciamento de coleta</p>
        </div>
      </div>
      <!-- fim da header -->

      <?php require 'arquivos_banco/mensagens.php'; //mensagens de aviso ?>
      
      <!-- inicio do painel tempo real -->
      <p>   
        <div class="panel panel-primary panel-lang">
          <div class="panel-heading">Acompanhar coleta em tempo real</div>
          <div class="panel-body">
            <div class="form-group">
              <!--link para listar tempo real--> 
              <a href="v_listar_tempo_real.php">

               <span class="glyphicon glyphicon-saved icones" aria-hidden="true"></span>
             Coleta em tempo real</a>
           </div>
         </div>
       </div> <!-- fim do painel coleta em tempo real-->

       <!-- inicio do painel nao cadastrado -->
       <p>   
        <div class="panel panel-primary panel-lang">
          <div class="panel-heading">Produtos não cadastrados</div>
          <div class="panel-body">
           <div class="form-group">
            <!--link para baixar arquivo como .csv--> 
            <a href="v_listar_tempo_nao_cadastrado.php">

             <span class="glyphicon glyphicon-saved icones" aria-hidden="true"></span>
           Produtos não cadastrados</a>
         </div>
       </div>
     </div> <!-- fim do painel nao cadastrado-->


     <!-- inicio painel apagar coletas do usuario -->
     <p>   
      <div class="panel  panel-danger panel-lang ">
        <div class="panel-heading">Excluir dados coletados por um usuário</div>
        <div class="panel-body">
          <div class="form-group">
            <!--link para baixar arquivo como .csv--> 
            <a href="v_listar_usuarios_excluir.php">

              <span class="glyphicon glyphicon-floppy-remove icones" aria-hidden="true"></span>
            Escolha um usuário</a>
          </div>
        </div>
      </div> <!-- fim do painel nao cadastrado-->


       <!-- inicio painel apagar coletas do usuario -->
     <p>   
      <div class="panel  panel-danger panel-lang ">
        <div class="panel-heading">FAbricantes coletados</div>
        <div class="panel-body">
          <div class="form-group">
            <!--link para baixar arquivo como .csv--> 
            <a href="v_listar_fabricantes_coletados.php">

              <span class="glyphicon glyphicon-floppy-remove icones" aria-hidden="true"></span>
            Lista de fabricante</a>
          </div>
        </div>
      </div> <!-- fim do painel nao cadastrado-->



    </section><!-- dim da sessao corpo-->
  </section><!-- fim da sessao principal-->

</body>
</html>