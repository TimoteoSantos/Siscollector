<?php
   require 'arquivos_banco/contagem.php';
         
         if(!empty($_SESSION['id'])){
   
         }else{
         
         header("Location: login.php");  
         }

          $usuario = $_SESSION['usuario'];

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
         <a class="navbar-brand" href="index.php"><img class="imagem" src="img/logo.png"> </a>
         <a class="navbar-brand marca" href="index.php">Siscollect <span style="color:red">
       
         <?php 
            //so vai mostrar se tiver nao cadastrado
            if ($nao[0] > 0) {
            ?>
            <span class="glyphicon glyphicon glyphicon-bell" aria-hidden="true"></span>
        
          <small> <?php echo  $nao[0] ?> </small> 
         <?php } ?>

         
         </a>


      </div>
      <div id="navbar" class="navbar-collapse collapse">
         <!-- menu-->
         <ul class="nav navbar-nav">

         	<!--avatar-->


<div id="mostrar">
         	<?php


//procura usuarios iguais ao digitado na tabela
$listagem = mysqli_query($conexao, "SELECT * from usuarios where usuario = '$usuario' ;");
//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
while($linha = mysqli_fetch_array($listagem)) {

$sexo = $linha['sexo']; //recebe o usuario do banco

}
            if ($sexo == "F"){

         		$caminho = "img/avatar_mulher.jpg";

         	}elseif($sexo == "M") {

				$caminho ="img/avatar_homem.jpg";

         	}

         	?>

</div>

            <li class="fim" id="mostrar"> <a href="#"><div class="ico"><img id="mostrar" src= <?php echo $caminho;?> class="ico" width="50px" alt=""></div> <h4> Olá <?php echo $usuario;?> :)</h4> </li> </a>

<!--fim do avatar-->

            <li><a href="listar.php"> <span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span> Listar</a></li>
            <li id="mostrar"><a href="pesquisar_index.php"> <span class="glyphicon glyphicon-search" aria-hidden="true"> </span> Pesquisar EAN</a></li>
            <li><a href="listar_nao_cadastrado.php"> <span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"> </span> Não Cadastrado</a></li>
            <li><a class="link" href="arquivos_banco/sair.php" onclick="return confirm('Sair?')">
               <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"> </span>
               Sair </a>
            </li>
             <li id="mostrar"><a href="#">
               <?php
               
                  @$sessao = $_SESSION['sessao'];

                   if (isset($sessao)){
                    //estoque / loja
                    $sessao_2 = mysqli_query($conexao, "SELECT * from sessao where id_sessao = '$sessao' limit 1");
                    
                    //o while repete a criaçao de linhas na tabela igual a quantidade de itens.
                    while($var = mysqli_fetch_array($sessao_2)) {
                    
                      $sessao_echo = $var['nome'];
                  
                     echo   "<span class='glyphicon glyphicon-random' aria-hidden='true'></span> &nbsp;" . $sessao_echo;
                  
                    
                        }//fim do estoque / loja

                    }
                    ?>
               </a>
            </li>
    
    <li class="fim" id="mostrar"><a href="#">

            <?php
               //estoque / loja
               $estoque = mysqli_query($conexao, "SELECT estoque_loja from config where estoque_loja > 0 limit 1 ");
               
               //o while repete a criaçao de linhas na tabela igual a quantidade de itens.
               while($varrer = mysqli_fetch_array($estoque)) {
               $estoque_ver = $varrer['0'];
               
                         switch ($estoque_ver) {
                           
                           case '1':
               
                             echo   "<span class='glyphicon glyphicon-export' aria-hidden='true'>  </span>  Estoque";
                             break;
               
                           case '2':
               
                             echo   "<span class='glyphicon glyphicon-import' aria-hidden='true'>  </span> Loja";
                             break;
                           
                                                     
                           }
                   }//fim do estoque / loja
               ?>
            </a>
            </li>
          
           
         </ul>
      </div>
      <!--/.nav-collapse -->
   </div>
</nav>