<?php

session_start();	
require "conexao.php";


	$listagem = mysqli_query($conexao,  "SELECT arquivo FROM config where conf = 1"); 

    while($linha = mysqli_fetch_array($listagem)) {

    //pega o destino
	$destino = $linha["arquivo"].'/arquivo_processado.txt'; // pega o caminho do banco e concatena com o nome do arquivo

	@unlink("$destino"); //apaga o arquivo

	/* destino dos arquivos configurados pelo usuario a proxima linha configura manualmente por aqui é so descomentar*/

	//$destino = "/util/temp/Arquivo_integracao.txt";

		$sql = "SELECT referencia, SUM(quantidade) AS quantidade, descricao INTO OUTFILE '$destino'
		FIELDS TERMINATED BY ';' OPTIONALLY ENCLOSED BY ''
		LINES TERMINATED BY '\r\n'
		FROM coletor_importar GROUP BY referencia ORDER BY referencia";
	
			$result = mysqli_query($conexao, $sql);
			
				}
				//se baixar
				if ($result) {
					//envia mensagem
					$_SESSION['msg'] = "<div class='alert alert-success'>Arquivo foi exortado para pasta. '$destino'!</div>";

					header("Location: ../v_baixar.php");
						//se nao baixar
						}else{

							$_SESSION['msg'] = "<div class='alert alert-danger'>ERRO! verifique se a pasta. '$destino'. existe!</div>";
							header("Location: ../v_baixar.php");

						}