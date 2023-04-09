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

   <?php require 'v_cabecalho.php'; //menu?>

   <section class="corpo"> <!-- centro da pagina-->

    <!-- header -->

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Importar arquivos</h1>
        <p class="lead">Importar arquivos do ERP para pesquisa</p>
      </div>
    </div>
    <!-- fim da header -->

    <?php require 'arquivos_banco/mensagens.php'; //mensagens de aviso ?>

    <!--painel -->
    <p>		
      <div class="panel panel-primary panel-lang-2">
        <div class="panel-heading">Importar arquivo do ERP para pesquisa nos coletores</div>
        <div class="panel-body">
         <div class="form-group">

           <form action="arquivos_banco/gravar_coletar.php" method="post" enctype="multipart/form-data">

            <label for="exampleTextarea">
              <span class="glyphicon glyphicon-level-up icones" aria-hidden="true"></span>

            Buscar arquivo de pesquisa</label>


            <input type="file" value="Escolher arquivo" name="file" required=""> <p>


              <br>

              <input type="submit" value="Enviar" class="btn btn-info">

            </form>

          </div>

        </div>
      </div> <!-- fim do painel-->



<!--
 
    <p>   
      <div class="panel panel-primary panel-lang-2">
        <div class="panel-heading">Importacao rapida</div>
        <div class="panel-body">
         <div class="form-group">

           <form action="arquivos_banco/importar_novo_up.php" method="post" enctype="multipart/form-data">

            <label for="exampleTextarea">
              <span class="glyphicon glyphicon-level-up icones" aria-hidden="true"></span>

            Buscar arquivo de pesquisa</label>


            <input type="file" value="Escolher arquivo" name="file" required=""> <p>


              <br>

              <input type="submit" value="Enviar" class="btn btn-info">

            </form>

          </div>

        </div>
      </div> 


-->

    <!--importar pela pasta -->
    <p>   
      <div class="panel panel-primary panel-lang-2">
        <div class="panel-heading">
        Para importar deixe na pasta configurada o arquivo com o nome "produtos" que deve ser do tipo ".txt"</div>
        <div class="panel-body">
         <div class="form-group">

           <form action="arquivos_banco/importar_novo.php" method="post">

            <label for="exampleTextarea">
              <span class="glyphicon glyphicon-floppy-remove icones" aria-hidden="true"></span>
            produtos.txt "Arquivo de exemplo <a href="arquivos_banco/arquivos_para_instalacao/exemplo_importar.txt " target="blank"> aqui </a> " </label> 
            <br>

            <input type="submit" value="importar"
            onclick="return confirm('Importar?')" 

            class="btn btn-primary">

          </form>

        </div>

      </div>
    </div> <!-- fim do painel-->


      <!-- inicio do painel -->

     <p>   
      <div class="panel panel-primary panel-lang-2">
        <div class="panel-heading">Intens importados para pesquisa</div>
        <div class="panel-body">
         <div class="form-group">

           <a href="v_listar_importados.php">

             <span class="glyphicon glyphicon-saved icones" aria-hidden="true"></span>
           Listar itens importados</a>
         </div>

       </div>
     </div> <!-- fim do painel-->

      <p>

        <!--painel do botao excluir -->
        <p>		
          <div class="panel panel-primary panel-lang-2">
            <div class="panel-heading">
            Excluir dados de pesquisa</div>
            <div class="panel-body">
             <div class="form-group">

               <form action="arquivos_banco/excluir_produtos_importados.php" method="post">

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

      </section><!--FIM DA SESSAO CORPO -->

    </section>

  </body>
  </html>