<?php





                  $listagem2 = mysqli_query($conexao,  "SELECT * FROM sessao");

                  while($linha = mysqli_fetch_array($listagem2)) {

                     $status = $linha['status'] ;





switch ($status) {
	case '2':
		$status_echo = "finalizado";
		break;
	
	//default:
		# code...
		//break;
}




}

?>