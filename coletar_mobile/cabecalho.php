<?php
        if(!empty($_SESSION['id'])){

        }else{
        
        header("Location: login.php");  
        }
        
        ?>
        
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

          <a class="navbar-brand" href="index.php"><img class="imagem" src="logo.png">
            
            <a class="navbar-brand marca" href="index.php">Siscollect Mobi

            	
            </a>

          </div>

          <div id="navbar" class="navbar-collapse collapse">


            <!-- menu-->
            <ul class="nav navbar-nav">
              <li> <a href="#"> Olá! <?php echo $_SESSION['usuario'];?>. </a> </li>
              <li><a href="listar.php">Listar</a></li>

              <li><a href="pesquisar_index.php">Pesquisar</a></li>


              <li><a class="link" href="arquivos_banco/sair.php" onclick="return confirm('Sair?')">Sair</li>
              
              </a>

              			<li><a href="#">
              	

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


     			</a></li>

            </ul>

          </div><!--/.nav-collapse -->
        </div>
      </nav>
