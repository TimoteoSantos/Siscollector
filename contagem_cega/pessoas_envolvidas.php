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

               <img src="img/logo.jpg" height="60px" width="60px" alt="">

               <header>

                  <?php include_once 'menu.php' ?>

               </header>

            </section>
            
            <section>
   <h4>Pessoas Envolvidas</h4>
   
<?php

      $listagem = mysqli_query($conexao,  "SELECT chave_sessao,  usuario FROM coletor_importar");


      while($linha = mysqli_fetch_array($listagem)) {


   echo $linha['chave_sessao'];
   echo "<br>";

      $lista = mysqli_query($conexao,  "SELECT chave_sessao,  usuario FROM coletor_importar");


      while($linha2 = mysqli_fetch_array($listagem)) {

      echo $linha2['usuario'];
      echo "<br>";
      



 } }?>



</section>




         </section>

         <!-- fim da div corpo -->

      </section>

      <!--fim da sessao principal-->

   </body>

      <script type="text/javascript" src="../coletor/bootstrap/js/jquery-3.5.1.min.js"></script>
      <script src="../coletor/bootstrap/js/bootstrap.min.js"></script>

</html>