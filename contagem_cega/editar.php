<?php
   session_start();
   require "../coletor/arquivos_banco/conexao.php";
     
   ?>
<!DOCTYPE html>

<html>
   <head>

      <title>coletor de dados</title>

      <!-- link para os css-->
      <link href="../coletor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css.css">
      <link rel="stylesheet" href="../coletor/normalize.css">

   </head>

   <body>
      <!-- sessao principal -->
      <section class="principal" id="principal">

         <section class="corpo">

            <section class="cabecalho">

             <!-- <img src="img/logo.jpg" height="60px" width="60px" alt=""> -->

               <header>

                  <?php include_once 'menu.php' ?>

               </header>

            </section>

            <section class="formulario">




                     <?php

      $id = $_GET['sessao'];

      $listagem = mysqli_query($conexao,  "SELECT * FROM sessao WHERE id_sessao = $id");

      while($linha = mysqli_fetch_array($listagem)) {
         
         ?>

               <form action="php/editar_sessao.php" method="post">

                  <fieldset>

                     <input type="hidden" value="<?php echo $id; ?>" name = "id_sessao">

                     Digite a sessão <input type="text" name="sessao" value="<?php echo $linha['nome']; ?>" >

                     <p></p>
                     Digite a quantidade<input type="text" name="quantidade" value="<?php echo $linha['quantidade']; ?>" >
                     <p></p>

                     <input type="submit"></input>

                  </fieldset>

               </form>

            </section>
<?php } ?>


         </section>

         <!-- fim da div corpo -->

      </section>

      <!--fim da sessao principal-->

   </body>

      <script type="text/javascript" src="../coletor/bootstrap/js/jquery-3.5.1.min.js"></script>
      <script src="../coletor/bootstrap/js/bootstrap.min.js"></script>

</html>