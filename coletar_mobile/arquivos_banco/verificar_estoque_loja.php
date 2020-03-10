<?php
//declaracao das variaveis pois elas poderao nao existir no wlhile por nao ter valor no banco
		$gravar_estoque = 0;
		$gravar_loja = 0;

		//verificar se estamos coletando fna loja ou no estoqu
		$estoque = mysqli_query($conexao, "SELECT estoque_loja from config where estoque_loja > 0 limit 1 ");

		while($varrer = mysqli_fetch_array($estoque)) {

		$estoque_ver = $varrer['0'];

		switch ($estoque_ver) {
			
			case '1':

				$gravar_estoque = 1;
				$gravar_loja = 0;
				break;

			case '2':

				$gravar_estoque = 0;
				$gravar_loja = 1;
				break;
			
			default:
				$gravar_estoque = 0;
				$gravar_loja = 0;
				break;
								
				}
			} //fim do estoque / loja