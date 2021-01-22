         
               <?php 
                  $usuario = $_SESSION['usuario'];
                  
                      //coloca em listagem um array com apenas os campos vazios de status
                      $listagem = mysqli_query($conexao,"SELECT max(id) as id, referencia, sum(quantidade) as quantidade, descricao from coletor_importar  where usuario = '$usuario' group by referencia order by id desc limit 1;");
                  
                     while($linha = mysqli_fetch_array($listagem)) {
                  
                  ?>
               <span class="minusculo"> <i> <?php echo $linha['descricao'];?> | <?php echo $linha['quantidade'];?> </i> </span>
               <?php } ?>



