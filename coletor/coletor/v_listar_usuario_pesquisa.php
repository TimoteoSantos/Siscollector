<?php
session_start();
//conexao com banco
require 'arquivos_banco/conexao.php';
require 'arquivos_banco/login_verificar.php';

?>

  <!DOCTYPE html>
  <html lang="pt-br">
  <head>

  <title>coletor de dados</title>

  <!-- link para os css-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="normalize.css">
  <meta charset="UTF-8">

</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">

   <?php require 'v_cabecalho.php'; ?>

   <section class="corpo">

    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Itens processados</h1>
        <p class="lead">Listar pesquisa</p>
      </div>
    </div>
    <!-- fim da header -->

  <?php 
        
        $pesquisar = filter_var($_POST['pesquisar'], FILTER_SANITIZE_STRING);
        
        $result = "SELECT * FROM auditoria WHERE usuario = '$pesquisar' ORDER BY data desc ";

        $resultado = mysqli_query($conexao, $result);

  ?>

    <!-- tabela -->

    <table class="table table-condensed">

     <!-- cabecalho da tabela-->
     <thead >

      <tr class="table-primary">

        <th scope="col">Usuário</th>
        <th scope="col">Data</th>
        <th scope="col">Auditoria</th>
        
      </tr>
    </thead>
    <!--corpo da tabela-->

    <tbody>

      <?php
      while($linha = mysqli_fetch_array($resultado)){

        $data = $linha['data']; //recebe a data atual

      ?>
        
        <tr>
         
          <td> <?= $linha['usuario'] ?> </td> 
          <td> <?php echo date('d/m/Y H:i:s', strtotime($data)); //formata a data para pt-br ?>  </td>  
          <td> <?= utf8_encode($linha['descricao']); //acentos ?> </td>    
        </tr>

      <?php } ?>
    </tbody>
  </table>

  <!-- fim da tabela -->
</section>
</section>

</body>
</html>