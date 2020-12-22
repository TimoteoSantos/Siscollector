<?php
   require 'arquivos_banco/contagem.php';
         
         if(!empty($_SESSION['id'])){
   
         }else{
         
         header("Location: login.php");  
         }
         
         ?>
<link href="../coletor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
   <div class="container" >
      <div class="navbar-header">
         <!--botao responsivo-->
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <!-- brand-->
         <a class="navbar-brand" href="index.php"><img class="imagem" src="logo.png"> </a>
         <a class="navbar-brand marca" href="index.php">Siscollect Mobi <span style="color:red">
         <?php 
            //so vai mostrar se tiver nao cadastrado
            if ($nao[0] > 0) {
            ?>
         ( <?php echo  $nao[0] ?> )
         <?php } ?>
         </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
         <!-- menu-->
         <ul class="nav navbar-nav">
            <li> <a href="#"> <span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Olá! <?php echo $_SESSION['usuario'];?>. </a> </li>
            <li><a href="listar.php"> <span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span> Listar</a></li>
            <li><a href="pesquisar_index.php"> <span class="glyphicon glyphicon-search" aria-hidden="true"> </span> Pesquisar EAN</a></li>
            <li><a href="listar_nao_cadastrado.php"> <span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"> </span> Não Cadastrado</a></li>
            <li><a class="link" href="arquivos_banco/sair.php" onclick="return confirm('Sair?')">
               <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"> </span>
               Sair </a>
            </li>
            <?php
               //estoque / loja
               $estoque = mysqli_query($conexao, "SELECT estoque_loja from config where estoque_loja > 0 limit 1 ");
               
               //o while repete a criaçao de linhas na tabela igual a quantidade de itens.
               while($varrer = mysqli_fetch_array($estoque)) {
               $estoque_ver = $varrer['0'];
               
                         switch ($estoque_ver) {
                           
                           case '1':
               
                             echo "Estoque";
                             break;
               
                           case '2':
               
                             echo "Loja";
                             break;
                           
                                                     
                           }
                   }//fim do estoque / loja
               ?>
            </a>
            </li>
            </a>
            <li><a href="#">
               <?php
                  $sessao = $_SESSION['sessao'];
                    //estoque / loja
                    $sessao_2 = mysqli_query($conexao, "SELECT * from sessao where id_sessao = '$sessao' limit 1");
                    
                    //o while repete a criaçao de linhas na tabela igual a quantidade de itens.
                    while($var = mysqli_fetch_array($sessao_2)) {
                    
                      $sessao_echo = $var['nome'];
                  
                     echo $sessao_echo;
                  
                    
                        }//fim do estoque / loja
                    ?>
               </a>
            </li>
         </ul>
      </div>
      <!--/.nav-collapse -->
   </div>
</nav>