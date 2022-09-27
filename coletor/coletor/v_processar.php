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

   <?php require 'v_cabecalho.php'; ?>

   <section class="corpo">


    <!-- header painel com a imagem -->

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Processar arquivos</h1>
        <p class="lead">Processor arquivos</p>
      </div>
    </div>
    <!-- fim da header -->

    <?php require 'arquivos_banco/mensagens.php'; //mensagens de aviso ?>

    <!-- inicio do painel processar -->

    <p>		
      <div class="panel panel-primary panel-lang">
        <div class="panel-heading">Processar</div>
        <div class="panel-body">
         <div class="form-group">

          <!--processar dados -->
          <form action="arquivos_banco/processar_arquivo.php" method="post">

            <label for="exampleTextarea">

              <span class="glyphicon glyphicon-refresh icones" aria-hidden="true"></span>
            Processar dados</label> 
            <br>

            <input  type="submit" class="btn btn-info" value="Processar">
            
          </form>
          <hr>
          <p>

            <!-- desfazer processamento -->
            <form action="arquivos_banco/excluir_processamento.php">

              <label for="exampleTextarea">

               <span class="glyphicon glyphicon-floppy-remove icones" aria-hidden="true"></span>
             Desfazer processamento da coleta</label> 
             <br>

             <input type="submit" value="Desfazer"
             onclick="return confirm('Desfazer processamento?')" 

             class="btn btn-danger">
             
           </form>

         </div>

       </div>
     </div> <!-- fim do painel-->

     <!-- inicio do painel -->

     <p>   
      <div class="panel panel-primary panel-lang-2">
        <div class="panel-heading">Intens processados</div>
        <div class="panel-body">
         <div class="form-group">

           <a href="v_listar_processados.php">

             <span class="glyphicon glyphicon-saved icones" aria-hidden="true"></span>
           Listar itens processados</a>
         </div>

       </div>
     </div> <!-- fim do painel-->


     <!-- inicio do painel -->

     <p>   
      <div class="panel panel-primary panel-lang-2">
        <div class="panel-heading">
        Excluir todos os dados coletados e importados</div>
        <div class="panel-body">
         <div class="form-group">

          <!--excluir -->
          <form action="arquivos_banco/excluir_todos_arquivos.php" method="post">

            <label for="exampleTextarea">

             <span class="glyphicon glyphicon-floppy-remove icones" aria-hidden="true"></span>
           Excluir tudo</label> 
           <br>

           <input type="submit" value="Excluir"

           onclick="return confirm('Cuidado! Essa auteração não poderá ser desfeita!')" 
           
           class="btn btn-danger">

           
         </form>

       </div>

     </div>
   </div> <!-- fim do painel-->

 </section>
</section>

</body>
</html>