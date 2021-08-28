<?php
   session_start();
   require "../coletor/arquivos_banco/conexao.php";
   require '../coletor/arquivos_banco/login_verificar.php';
     
    //verificar se a sessao foi ativada
    $sessao_contar = mysqli_query($conexao, "SELECT COUNT(sessao) as sessao  FROM config WHERE sessao > 0");
    $sessao = $sessao_contar->fetch_row();
    //se a sessao foi ativada
    if ($sessao[0] < 1)
    {
   //redireciona
   header("Location: v_aviso.php");

    }
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
               <div class="alert alert-secondary" role="alert">
                  <!--mensagens na tela-->
                  <?php
                     if(isset($_SESSION['msg'])){
                     echo $_SESSION['msg'];
                     unset($_SESSION['msg']);
                     
                     }
                     ?>
               </div>
               <!--fim das mensagens-->
            </section>
            <section class="formulario">
               <form action="php/cadastrar_sessao.php" method="post">
                  <fieldset>
                     Digite a sessão <input type="text" name="sessao" >
                     <p></p>
                     Digite a quantidade<input type="text" name="quantidade" >
                     <p></p>
                     <input type="submit"></input>
                  </fieldset>
               </form>
            </section>

            <!--todas as sessoes-->
            <section class="tabela">
               <h3> Todas as sessões</h3>
               <table class="table">
                  <tr>
                     <td>Sessão</td>
                     <td>Quantidade contada</td>
                     <td>Quantidade coletada</td>
                     <td>Divergência</td>
                     <td>STATUS</td>
                     <td>Excluir</td>
                     <td> Zerar Coleta</td>
                     <td>Editar</td>
                     <td>Finalizar</td>
                     <td>%</td>
                  </tr>
                  <?php
                     $listagem = mysqli_query($conexao,  "SELECT sessao.nome, sessao.quantidade as quantidade, sessao.status as status, sessao.id_sessao, sum(coletor_importar.quantidade) as quantidade_coletada FROM sessao LEFT JOIN coletor_importar ON (sessao.id_sessao = coletor_importar.chave_sessao) group by sessao.id_sessao order by sessao.nome");
                     
                     while($linha = mysqli_fetch_array($listagem)) {
                     
                        #quantidade devergente
                        $Divergência = $linha['quantidade'] - $linha['quantidade_coletada'];
                     

                     /*porcentagem*/
                        $quantidade = $linha['quantidade'];

                        if ($quantidade > 0 ) {
                          
                        $porcentagem = ($linha['quantidade_coletada'] / $quantidade) * 100;

                        }


                    if(isset($porcentagem)){
                        	
                        	$porcentagem = $porcentagem;
                        
                        }else{

                        	$porcentagem = 0;
                        }



                        /*fim da porcentagem*/

                        /*status*/
                                          
                        $status = $linha['status'];
                        $status_echo = '';

                        if($linha['quantidade_coletada'] > 0 and $linha['status'] <> 2)
                        {
                     
                            $status_echo = 'coletando';
                     
                        }elseif ($status == 2) {
                        
                           $status_echo = 'finalizado';
                        
                        }elseif($status == 1){
                     
                           $status_echo = 'criada';
                        
                        }
                     /*fim status*/

                     ?>
                  <tr>

                     <td>
                     <a  class="btn  btn-default" href="status_sessao.php?sessao=<?= $linha['id_sessao'] ?>" role="button">
                     <?php echo $linha['nome']; ?> </a>
                     </td>

                     <td> <?php echo $linha['quantidade']; ?></td>
                     <td> <?php echo $linha['quantidade_coletada']; ?></td>
                     <td> <?php echo $Divergência  ; ?></td>
                     <td><?php echo $status_echo; ?></td>
                     <td><a  class="btn btn-danger" href="php/Excluir_sessao.php?sessao=<?= $linha['id_sessao'] ?>" role="button"  onclick="return confirm('Excluir ?')" >Excluir</a></td>

                     <td><a  class="btn btn-danger" href="php/zerar_coleta.php?sessao=<?= $linha['id_sessao'] ?>" role="button"  onclick="return confirm('Excluir ?')" >Zerar coleta</a></td>




                     <td><a  class="btn btn-info" href="editar.php?sessao=<?= $linha['id_sessao'] ?>" role="button"> Editar</a></td>
                     <?php if ($linha['status'] <> 2) { ?>
                     <td><a  class="btn btn-info" href="php/finalizar.php?sessao=<?= $linha['id_sessao'] ?>" role="button" onclick="return confirm('Finalizar ?')" >Bloquear</a></td>
                     <?php }else{ ?>
                     <td><a  class="btn btn-danger" href="php/finalizar_desfazer.php?sessao=<?= $linha['id_sessao'] ?>" role="button"  onclick="return confirm('Desfazer ?')" >Desbloquear</a></td>
                     <?php } ?>
                     <td><?php echo $porcentagem; ?>%</td>
                  </tr>
                  <?php } ?>
               </table>
               <!--fim da tabela-->
            </section>
            
         </section>
         <!-- fim da div corpo -->
      </section>
      <!--fim da sessao principal-->
   </body>
   <script type="text/javascript" src="../coletor/bootstrap/js/jquery-3.5.1.min.js"></script>
   <script src="../coletor/bootstrap/js/bootstrap.min.js"></script>
</html>