<?php



	//fabricante errado
			$lista_conf = mysqli_query($conexao, "SELECT conf from config where conf = 4 ");	

			while($conf = mysqli_fetch_array($lista_conf)) {

			$conf = $conf['conf'];



			$lista = mysqli_query($conexao, "SELECT fabricante from pdf ");	

			while($fab = mysqli_fetch_array($lista)) {

			$fab = $fab['fabricante'];


			$fabricante = $linha['fabricante'];

			if ($fabricante <> $fab and $conf = 4){
			
			$_SESSION['msg'] = "<span class='alerta'>FABRICANTE NÃO É $fab ! </span> <span> <audio src='erro.mp3' autoplay></audio> </span>";


					}
				}
			}

