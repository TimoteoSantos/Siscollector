
<?php

 session_start();
//conexao com banco
 require 'arquivos_banco/conexao.php';
//inicia a sessao
 require 'arquivos_banco/login_verificar.php';

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_importar");
//conta
$contar = $listagem->fetch_row();
//recebe o valor
$id = $contar;

if ($id[0] < 1 ) { 

//enviar mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Você ainda não coletou ou importou!</div>";
header("Location: v_coleta.php");

}

?>

  
  <!DOCTYPE html>
  <html>
  <head>

	<title> coletor de dados</title>

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
   
   <?php   require 'v_cabecalho.php';   ?>

   <section class="corpo">


    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Tempo real</h1>
        <p class="lead">Listar itens coletados em tempo real</p>
      </div>
    </div>
    <!-- fim da header -->

    <?php 

    $listagem = mysqli_query($conexao,  "SELECT max(id) as id, referencia, sum(quantidade), descricao, usuario FROM coletor_importar group by referencia order by id desc");

    ?>

    <table class="table table-condensed">

     <!-- cabecalho da tabela-->
     <thead >

      <tr class="table-primary">

        <th scope="col">EAN</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Descrição</th>

        
      </tr>
    </thead>
    <!--corpo da tabela-->

    <tbody>
	  <?php
    while($linha = mysqli_fetch_array($listagem)) {
    ?>

        <tr>
          <td> <?= $linha['referencia'] ?> </td> 
          <td> <?= $linha ['sum(quantidade)'] ?> </td>
          
        <td> 
        <a href="v_listar_tempo_detalhe.php?referencia=<?= $linha['referencia'] ?>">
        <?= utf8_encode($linha['descricao']); ?> </a></td> 
 
   
        </tr>
		
        <?php } ?>

    </tbody>
  </table>

</section>
</section>

</body>
</html>