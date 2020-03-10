<?php     

								
			 			if(isset($_SESSION['msg'])){
			              echo $_SESSION['msg'];
			              unset($_SESSION['msg']);
			              }

						  $usuario = $_SESSION['usuario'];

						    $l = mysqli_query($conexao,"SELECT id, quantidade FROM coletor_importar ORDER BY id DESC LIMIT 1;");

						   while($linha2 = mysqli_fetch_array($l)) {

						    $alerta = $linha2[1];

						    if ($alerta > 50){

						    echo "<p class='alerta'> OBSERVE A QUANTIDADE ! = '$alerta'<audio src='erro.mp3' autoplay></audio> </p>";

					  }

					   }


					?>