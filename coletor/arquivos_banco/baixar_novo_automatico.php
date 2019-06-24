<?php
	session_start();	
	require "conexao.php";

	$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_importar");
	//conta
	$contar = $listagem->fetch_row();
	//pega o valor
	$id = $contar;

	//se tem importado
	if ($id[0] > 0 ) {


    $listagem = mysqli_query($conexao,  "SELECT arquivo FROM config where conf = 1 limit 1"); 
    while($linha = mysqli_fetch_array($listagem)) {

    	//pega o destino
		$destino = $linha["arquivo"]. '/Arquivo_integracao.txt'; // pega o caminho do banco e concatena com o nome do arquivo

		@unlink("$destino"); //apaga o arquivo

		/* destino dos arquivos configurados pelo usuario a proxima linha configura manualmente por aqui é so descomentar*/

		//$destino = "/util/temp/Arquivo_integracao.txt";
		
		//baixa
		$sql = "SELECT referencia, quantidade, descricao, usuario INTO OUTFILE '$destino' 
		FIELDS TERMINATED BY ';'
		LINES TERMINATED BY '\r\n'
		FROM coletor_importar";

		$resul = mysqli_query($conexao, $sql);

		//usuarios

		$escrever_destino = $linha["arquivo"];

		/* destino dos arquivos configurados pelo usuario a proxima linha configura manualmente por aqui é so descomentar e comentar a que esta abaixo*/

		//$destino = "/util/temp/Arquivo_integracao.txt";
		
		$destino = $linha["arquivo"]. '/Arquivo_usuarios.txt'; // pega o caminho do banco e concatena com o nome do arquivo

		@unlink("$destino"); //apaga o arquivo

		//baixa
		$sql = "SELECT usuario, senha INTO OUTFILE '$destino' 
		FIELDS TERMINATED BY ';'
		LINES TERMINATED BY '\r\n'
		FROM usuarios";

		$result = mysqli_query($conexao, $sql);

		}
		//se baixar
		if ($resul and $result) {

			?>
		
		<!-- link para os css-->
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		
		<style>
			
			h1{
				margin-top: 25px;
				color: #4682B4;
			}

			h1, h2, h4 {
				margin-left: 30px;
			}

			h2 {
				color: #B0C4DE;
			}
			h3 {
				color:#8B0000;
			}

			h4 {
			color: red;
			}
		
			</style>
		
			<!--autalizar e fazer contagem-->
			<script type="text/javascript">

			/*função para autalizar a pagina*/Redirect();
			function Redirect()
			{
				setTimeout("location.reload(true);",60000);   
			}

			var i = 60; // fazer contagem javascript
			function contagemRegressiva(){
			if(i == 0){
				document.getElementById('cronometro').innerHTML = 'O tempo acabou!!';
			}else{
				i--;
				document.getElementById('cronometro').innerHTML = i + ' segundos';
			 }

			}
				setInterval("contagemRegressiva()", 1000); /*tempo da contagem*/
		
		</script>
				
		<h1>Mantenha essa página aberta!</h1>
		<h2>Baixando a cada 1(um) minuto...</h2>
		<h1  id="cronometro"> 60 Segundos </h1> <!-- relogio de contagem regressiva-->

		<?php
		//escreve a pasta de desino
		 echo "<h4> Pasta de destino: $escrever_destino </h4>";
		//se nao achar a pasta
		}else{
			//se nao achar a pasta
			$_SESSION['msg'] = "<div class='alert alert-danger'>Configure a pasta!</div>";
			header("Location: ../v_baixar_integracao.php");
			echo "$destino";
		}
		//se nao tiver importados
		}else{

		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro! nada coletado!</div>";
			header("Location: ../v_baixar_integracao.php");
		
		}