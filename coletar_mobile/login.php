<?php
   session_start();
   require '../coletor/arquivos_banco/conexao.php';
   ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Siscolect Mobi</title>
      <!-- Bootstrap core CSS -->
      <link href="./index_files/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="./index_files/css.css" rel="stylesheet">
   </head>
   <body>
      <div class="container fixo">
         <span class="alert vermelho" role="alert">
         <?php
            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
            ?>
         </span>
         <div class="panel panel-default">
            <div class="panel-body">
               <img src="logo_login.png" class="img">
               <form method="POST" action="arquivos_banco/valida.php">
                  <div class="form-group">
                     <?php 
                       
                        $sessao_contar = mysqli_query($conexao,  "SELECT COUNT(sessao) as sessao  FROM config WHERE sessao > 0");
                        $sessao = $sessao_contar->fetch_row();
                             
                        if ($sessao[0] == 1 ) {
                        
                        ?>
                     <!-- selecionar sessao -->
                     <select name="sessao" id="" class="enviar">
                        <?php 
                           //coloca em listagem um array com apenas os campos vazios de status
                           $listagem = mysqli_query($conexao,"SELECT * FROM sessao;");
                           
                           while($linha = mysqli_fetch_array($listagem)) {
                           
                           ?>
                        <option value = "<?php echo $linha['id_sessao']; ?>" > <?php echo $linha['nome']; ?></option>

                          <?php   }    ?>

                       </select>


                     <?php   }    ?>
                     <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" placeholder="Usuário" required="" autofocus="" autocomplete="off">
                     <input type="password" name="senha" class="form-control" id="exampleInputEmail1" placeholder="Senha" required=""  autocomplete="off">
                  </div>
                  <input type="submit" class="btn btn-primary enviar" value="Entrar" name="btnLogin">
               </form>
            </div>
         </div>
      </div>
      <!-- /container -->
      <!-- Bootstrap core JavaScript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="./index_files/jquery.min.js.download"></script>
      <script src="./index_files/bootstrap.min.js.download"></script>
   </body>
</html>