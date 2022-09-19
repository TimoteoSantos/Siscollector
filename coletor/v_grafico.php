<?php
 session_start();
 require 'arquivos_banco/login_verificar.php';
 require 'arquivos_banco/contagens.php';
 ?>

<!DOCTYPE html>
<html>
<head>

	<title>coletor de dados</title>

	<!-- link para os css-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="css.css"> <!-- meu css -->


<!-- atualização automatica-->
	
<?php

include 'arquivos_banco/atualizar_automaticamente.php'

?>
	
</head>

<body>
	
  <section class="grafico">
	<html>
	<?php

	$porcentagem =  round($porcentagem,0);

	$cento = 100;
	$andamento = $cento - $porcentagem;

	?>

  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Coletado', <?php  echo $porcentagem; ?> ],
          ['Falta Coletar', <?php echo $andamento; ?>]
        ]);

        var options = {
          title: '',
          pieHole: 0.9,
		
		slices: {0: {color: '#3CB371'}, 1: {color: '#FF4500'}},


          pieSliceTextStyle: {
            color: 'black',

          },

        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 550px;"></div>



<!--painel de contagem produtos coletados-->
      <div class="panel panel-primary painel_contagem">
        <div class="panel-heading panel-heading-coletados vermelho">
          <h3 class="panel-title">  Quantidade de registros coletados</h3>
        </div>
        <div class="panel-body centro">
          <h4> <?php echo $coletado[0]; ?> </h4>
        </div>
      </div><!--fim do painel contagem produtos coletados-->

      
      <!--quantidade total-->
      <div class="panel panel-primary painel_contagem ">
        <div class="panel-heading panel-heading_index vermelho">
          <h3 class="panel-title"> Soma dos produtos </h3>
        </div>
        <div class="panel-body centro">
          <h4><?php echo $total[0]; ?> </h4>
        </div>
      </div><!--fim do painel contagem produtos importados-->

      </div><!--fim do painel contagem produtos processaos-->
      

      <!--painel de contagem produtos importados
      <div class="panel panel-primary painel_contagem">
        <div class="panel-heading panel-heading_index">
          <h3 class="panel-title"> <a href="v_pesquisa_preco.php"> Quantidade Produtos Cadastrados no ERP </a></h3>
        </div>
        <div class="panel-body centro">
          <h4><?php echo $itens[0]; ?> </h4>
        </div>
      </div> fim do painel contagem produtos importados-->

      
      <!--painel de contagem produtos nao cadastrados-->
      <div class="panel panel-primary painel_contagem ">
        <div class="panel-heading panel-heading_index">
          <h3 class="panel-title"> <a href="v_listar_tempo_nao_cadastrado.php">Produtos não cadastrados </a></h3>
        </div>
        <div class="panel-body centro">
          <h4><?php echo $nao[0]; ?> </h4>
        </div>
      </div><!--fim do painel contagem produtos importados-->

	<?php  include 'rodape.php' ?>

</section>

</body>