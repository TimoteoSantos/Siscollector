<?php
session_start();
//conexao com banco
require '../coletor/arquivos_banco/conexao.php';
//inicia a sessao
//require 'arquivos_banco/valida.php';
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

   <section class="corpo"> <!-- centro da pagina-->

    <!-- header -->

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Breack Vendas</h1>
        <p class="lead">Subtrair as vendas</p>
      </div>
    </div>
    <!-- fim da header -->


    <section class="corpo2"> <!-- centro da pagina-->


    <?php require 'arquivos_banco/mensagens.php'; //mensagens de aviso ?>

    <!--painel -->
    <p>		
      <div class="panel panel-primary">
        <div class="panel-heading">Importar arquivo do ERP vendas</div>
        <div class="panel-body">
         <div class="form-group">

           <form action="arquivos_banco/gravar_coletar.php" method="post" enctype="multipart/form-data">

            <label for="exampleTextarea">
              <span class="glyphicon glyphicon-level-up icones" aria-hidden="true"></span>

            Importar</label>


            <input type="file" value="Escolher arquivo" name="file" required=""> <p>


              <br>

              <input type="submit" value="Enviar" class="btn btn-info">

            </form>

          </div>

        </div>
      </div> <!-- fim do painel-->


     <!-- inicio do painel -->

     <p>   
      <div class="panel panel-primary">
        <div class="panel-heading">Consultar no Acess</div>
        <div class="panel-body">
         <div class="form-group">

         

             <span class="glyphicon glyphicon-saved icones" aria-hidden="true"></span>
SELECT memoria_Vendas.[Cód Fabricante], memoria_Vendas.Mercadoria, memoria_Vendas.Quantidade_Item
FROM memoria_Vendas
WHERE (((memoria_Vendas.[Data da Venda])=#1/18/2019#) AND ((memoria_Vendas.LojaOrigem)="loja 03"));

         </div>

       </div>
     </div> <!-- fim do painel-->

      <p>

      	 <p>   
      <div class="panel panel-primary">
        <div class="panel-heading">Intens importados para pesquisa</div>
        <div class="panel-body">
         <div class="form-group">

           <a href="v_listar_importados.php">

             <span class="glyphicon glyphicon-saved icones" aria-hidden="true"></span>
           Listar itens importados</a>
         </div>

       </div>
     </div> <!-- fim do painel-->

        <!--painel do botao excluir -->
        <p>		
          <div class="panel panel-primary">
            <div class="panel-heading">
            Excluir dados</div>
            <div class="panel-body">
             <div class="form-group">

               <form action="arquivos_banco/excluir_produtos_importados.php" method="post">

                <label for="exampleTextarea">
                  <span class="glyphicon glyphicon-floppy-remove icones" aria-hidden="true"></span>
                Excluir</label> 
                <br>

                <input type="submit" value="excluir"
                onclick="return confirm('Cuidado! Essa ação não poderá ser desfeita!')" 

                class="btn btn-danger">

              </form>

            </div>

          </div>
        </div> <!-- fim do painel-->
        
        <!--painel do botao excluir -->
        <p>		
          <div class="panel panel-primary">
            <div class="panel-heading">
            Processar</div>
            <div class="panel-body">
             <div class="form-group">

               <form action="arquivos_banco/processar_arquivo.php" method="post">

                <label for="exampleTextarea">
                  <span class="glyphicon glyphicon-floppy-remove icones" aria-hidden="true"></span>
                Processar importados</label> 
                <br>

                <input type="submit" value="processar"
                onclick="return confirm('Prcessar!')" 

                class="btn btn-danger">

              </form>

            </div>

          </div>
        </div> <!-- fim do painel-->
</section>

      </section><!--FIM DA SESSAO CORPO -->

    </section>

  </body>
  </html>