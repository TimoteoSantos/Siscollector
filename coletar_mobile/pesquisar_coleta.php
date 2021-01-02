<?php

session_start();
require  '../coletor/arquivos_banco/conexao.php';
	

	$ref = $_POST['ref'];



	if ($ref / 1)

	{



		$listagem = mysqli_query($conexao, "SELECT * from coletar where referencia = $ref  group by referencia; ");

		while($linha = mysqli_fetch_array($listagem)) {
				
			
				$referencia = $linha['referencia'];
				$codigo = $linha['preco'];
				$descricao = $linha['descricao'];

				$preco = $linha['preco'];

				$prec = number_format($preco, 2, ',', '.');

				//number_format($preco, 2, ',', '.');

if ($ref == $referencia){

	header("Location: pesquisar_index.php");
	

	if ($linha['quantidade'] > 0){

        $_SESSION['msg'] = "<p style='color:#FF4500; size=22px;'> $prec | <span style='color:#800000; size=22px;'> $linha[quantidade] </span> <span style='color:black; size=22px;'>| $linha[descricao] <br> $linha[referencia] | </span> <span style='color:green; size=22px;'> $linha[fabricante] </span> </p>";

		require 'som_e_fabricante.php';



	}else{


        $_SESSION['msg'] = "<p style='color:#FF4500; size=22px;'> $prec | <span style='color:#800000; size=22px;'> $linha[quantidade] </span> <span style='color:black; size=22px;'>| $linha[descricao] <br> $linha[referencia] | </span> <span style='color:green; size=22px;'> $linha[fabricante] </span> </br> Zerado no sistema ! </p> <audio src='erro.mp3' autoplay></audio>";

        require 'som_e_fabricante.php';






    }
}

}


if ($ref != isset($referencia)){

	header("Location: pesquisar_index.php");
	$_SESSION['msg'] = "<p style='color:#B22222;'> <audio src='erro.mp3' autoplay></audio> SEM CADASTRO! <br> <span style='color:black; size=22px;'> $ref </span></p>";

}

}else{


		$listagem = mysqli_query($conexao, "SELECT * from coletar where descricao like '%$ref%'  group by referencia; ");

		while($linha = mysqli_fetch_array($listagem)) {
				
	
	?>

	<table class="table table-condensed">

     <?php
      while($linha = mysqli_fetch_array($listagem)){
      ?>
        <tr>

          <td> <a href=""><?= utf8_encode($linha['descricao']); ?> </a> </td>
          

        </tr>
      <?php } ?>
  
  </table>

	
<?php

}

}

?>