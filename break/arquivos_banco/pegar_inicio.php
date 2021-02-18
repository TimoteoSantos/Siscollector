<?php
require '../../coletor/arquivos_banco/conexao.php';

	$listage = mysqli_query($conexao, "SELECT id, hora from coletor_importar where id = 1 limit 1;");

	//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
	while($linha = mysqli_fetch_array($listage)) {


		$hora_inicio = $linha['hora'];

	
}
?>