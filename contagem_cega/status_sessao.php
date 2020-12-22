<?php
   session_start();
   require "../coletor/arquivos_banco/conexao.php";
   
   $id = $_GET['sessao'];
   
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
               <div class="panel panel-default">
                  <div class="panel-body">
                     <?php
                        $listagem = mysqli_query($conexao, "SELECT sessao.nome as nome, sessao.quantidade as quantidade, sessao.status as status, sessao.id_sessao, sum(coletor_importar.quantidade) as quantidade_coletada FROM sessao LEFT JOIN coletor_importar ON (sessao.id_sessao = coletor_importar.chave_sessao) WHERE coletor_importar.chave_sessao = '$id' group by sessao.id_sessao LIMIT 1 ");
                        
                        while ($linha = mysqli_fetch_array($listagem))
                        {
                        
                            $Divergência = $linha['quantidade'] - $linha['quantidade_coletada'];
                        
                            /*porcentagem*/
                            $quantidade = $linha['quantidade'];
                        
                            if ($quantidade > 0)
                            {
                        
                                $porcentagem = ($linha['quantidade_coletada'] / $quantidade) * 100;
                        
                            }
                        
                            $parcial = $linha['quantidade_coletada'];
                            $total1 = $quantidade;
                        
                            $total = $total1 - $parcial;
                        
                            /*fim da porcentagem*/
                        
                            /*status*/
                        
                            $status = $linha['status'];
                            $status_echo = '';
                        
                            if ($linha['quantidade_coletada'] > 0 and $linha['status'] <> 2)
                            {
                        
                                $status_echo = 'coletando';
                        
                            }
                            elseif ($status == 2)
                            {
                        
                                $status_echo = 'finalizado';
                        
                            }
                            elseif ($status == 1)
                            {
                        
                                $status_echo = 'criada';
                        
                            }
                            /*fim status*/
                        
                        ?> 
                     <h3>Sessão [<?php echo $linha['nome']; ?>]</h3>
                     <H4>Quantidade contada [<?php echo $linha['quantidade']; ?>]</H4>
                     <h4>Quantidade coletada [<?php echo $linha['quantidade_coletada']; ?>]</h4>
                     <h4>Digergência [<?php echo $Divergência; ?>]</h4>
                     <h4>Status [<?php echo $status_echo; ?>]</h4>
                     <div class="progress grafico">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem; ?>%;">
                           <h4><?php echo $porcentagem; ?> % </h4>
                           <span class="sr-only"></span>
                        </div>
                     </div>
                     <!--
                        <div class="progress" style="height: 40px;">
                          <div class="progress-bar progress-bar-warning barra" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php //echo $porcentagem;
                           ?>%" >
                           <span class=""><?php //echo $porcentagem;
                           ?>%</span>
                          </div>
                        </div>
                        -->
                     <?php
                        } ?>
                     <section>
                        <h4>Pessoas Envolvidas</h4>
                        <?php
                           $listagem = mysqli_query($conexao, "SELECT chave_sessao, sum(quantidade) as quantidade, usuario FROM coletor_importar WHERE chave_sessao = $id GROUP BY usuario ");
                           
                           while ($linha = mysqli_fetch_array($listagem))
                           {
                           
                           ?>
                        <ul class="list-group">
                           <li class="list-group-item">
                              <span class="badge"><?php echo $linha['quantidade']; ?></span>
                              <?php echo $linha['usuario']; ?>
                           </li>
                        </ul>
                        <?php
                           } ?>
                        </table>
                     </section>
                  </div>
               </div>
            </section>
         </section>
         <!-- fim da div corpo -->
      </section>
      <!--fim da sessao principal-->
   </body>
   <script type="text/javascript" src="../coletor/bootstrap/js/jquery-3.5.1.min.js"></script>
   <script src="../coletor/bootstrap/js/bootstrap.min.js"></script>
</html>