<?php
session_start();
  //conexao com banco
require 'arquivos_banco/conexao.php';
  //inicia a sessao
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
   <?php require 'v_cabecalho.php'; //inclui o topo da pagina inclusive o menu?>

   <section class="corpo"> <!-- centro da pagina-->

    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Importar arquivos</h1>
        <p class="lead">Importar arquivos dos coletores</p>
      </div>
    </div>
    <!-- fim da header -->

    <?php require 'arquivos_banco/mensagens.php';//mensagens de aviso ?>

    <!--painel -->
    <p>		
      <div class="panel panel-primary panel-lang-2 ">
        <div class="panel-heading">Importar arquivo dos coletores</div>
        <div class="panel-body">
          <div class="form-group">

            <!-- botao para importar  -->
            <form action="arquivos_banco/gravar_arquivo_importar.php" method="post" enctype="multipart/form-data">

             <label for="exampleTextarea">
              <span class="glyphicon glyphicon-level-up icones" aria-hidden="true"></span>

            Buscar arquivo</label>
            <input type="file" class="form-control-file" name="file" required=""> <br>
            <input type="submit" value="Gravar" class="btn btn-info">
          </form>

        </div>

      </div>
    </div> <!-- fim do painel-->

    <!-- inicio do painel todos importados -->
    <p>   
      <div class="panel panel-primary panel-lang-2 ">
        <div class="panel-heading">Listar todos importados</div>
        <div class="panel-body">
          <div class="form-group">
            <!--link para listar tempo real--> 
            <a href="v_listar_importados_coletor.php">

             <span class="glyphicon glyphicon-saved icones" aria-hidden="true"></span>
           Listar importados</a>
         </div>
       </div>
     </div> 

     <p>


      <!--painel do botao excluir -->
      <p>		
        <div class="panel panel-primary panel-lang-2 ">
          <div class="panel-heading">
          Excluir todos os dados importados</div>
          <div class="panel-body">
           <div class="form-group">

            <form action="arquivos_banco/excluir_importado.php" method="post">

              <label for="exampleTextarea">
                <span class="glyphicon glyphicon-floppy-remove icones" aria-hidden="true"></span>
              Excluir importados</label> 
              <br>

              <input type="submit" value="excluir"
              onclick="return confirm('Cuidado! Essa ação não poderá ser desfeita!')" 

              class="btn btn-danger">
              
            </form>

          </div>

        </div>
      </div> <!-- fim do painel-->



    </section><!--FIM DA SESSAO CORPO -- >
  </section>

</body>
</html>