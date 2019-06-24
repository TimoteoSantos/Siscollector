<?php
session_start();
//conexao com banco
require 'arquivos_banco/conexao.php';
require 'arquivos_banco/login_verificar.php';

$referencia = $_GET['referencia'];
//referencia = '1111';

?>

<!DOCTYPE html>
<html>
<head>

  <title>coletor de dados</title>

  <!-- link para os css-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="normalize.css">

<?php

include 'arquivos_banco/atualizar_automaticamente.php'

?>


</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">
   
   <?php require 'v_cabecalho.php';?>
   
   <section class="corpo">


    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Detalhe da coleta</h1>
        <p class="lead">Detalhe da coleta de um produto</p>
      </div>
    </div>
    <!-- fim da header  -->

  <h4> <a href="v_listar_tempo_real.php"> <span class="glyphicon glyphicon-hand-left icones" aria-hidden="true"></span> << voltar</a> </h4>
    <?php 
    $listagem = mysqli_query($conexao,"SELECT id, referencia,quantidade, descricao, usuario, hora from coletor_importar   where referencia = '$referencia' order by id;");

    ?>

    <table class="table table-condensed">

     <!-- cabecalho da tabela-->
     <thead >

      <tr class="table-primary">

        <th scope="col">EAN</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Descrição</th>
        <th scope="col">Usuario</th>
        <th scope="col">Data e hora</th>
        
      </tr>
    </thead>
    <!--corpo da tabela-->
    <?php

    while($linha = mysqli_fetch_array($listagem)) {

    ?>

      <tr>
      <?php $data = $linha['hora']; ?>
      
        <td> <?= $linha['referencia'] ?> </td> 
        <td> <?= $linha['quantidade'] ?> </td>  

        <td> <?= utf8_encode($linha['descricao']); ?> </td>    
        <td> <?= $linha['usuario'] ?> </td> 
        <td> <?php echo date('d/m/Y H:i:s', strtotime($data)); //formata a data para pt-br ?>  </td> 
      </tr>
      
      <?php } ?>

    </tbody>
  </table>

</section>
</section>

</body>
</html>