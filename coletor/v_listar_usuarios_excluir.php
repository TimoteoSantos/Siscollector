<?php 
session_start();
//conexao com banco
require 'arquivos_banco/conexao.php';
require 'arquivos_banco/login_verificar.php';
?>

<!DOCTYPE html>
<html>
<head>
  <?php

  $listagem = mysqli_query($conexao,  "SELECT COUNT(usuario)  FROM coletor_importar");
  //conta
  $contar = $listagem->fetch_row();
  //recebe o valor
  $id = $contar;

  $listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
  //conta
  $conta = $listagem->fetch_row();
  //recebe o valor
  $id2 = $conta;

  //condicao
  if ($id[0] < 1 or $id2[0] > 1 ) { 

    $_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Nenhum usuario coletou ou tem processamento!</div>";
    header("Location: v_coleta.php");

  }

  ?>

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

   <?php require 'v_cabecalho.php'; ?>

   <section class="corpo">

    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Excluir coleta de um usuário</h1>
        <p class="lead">Apagar todos os arquivos arquivos de um usuário</p>
      </div>
    </div>
    
    <!-- fim da header -->

    <?php 

    $listagem = mysqli_query($conexao,  "SELECT usuario, COUNT(DISTINCT referencia) as referencia from coletor_importar group by usuario order by usuario ;");
    ?>

    <table class="table table-condensed">

     <!-- cabecalho da tabela-->
     <thead >

      <tr class="table-primary">

        <th scope="col">Usuario</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Excluir</th>

        
      </tr>
    </thead>
    <!--corpo da tabela-->

    <tbody>

     <?php

     while($linha = mysqli_fetch_array($listagem)) {

      ?>

      <tr>
        <td> <?= $linha['usuario'] ?> </td> 
        <td> <?= $linha['referencia'] ?> </td> 


        <td ><a href="arquivos_banco/excluir_coleta_usuario.php?usuario=<?= $linha['usuario'] ?>"  onclick="return confirm('Isso excluirá todos os dados coletados pelo usuário, tem certeza disso?')"> Excluir </a> </td>
      </tr>

    <?php } ?>

  </tbody>
</table>

</section>
</section>

</body>
</html>