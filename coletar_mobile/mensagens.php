<?php
						  $usuario = $_SESSION['usuario'];

						    $l = mysqli_query($conexao,"SELECT max(id) as id, quantidade FROM coletor_importar where usuario = '$usuario' ORDER BY id DESC LIMIT 1 ;");

						   while($linha2 = mysqli_fetch_array($l)) {

						    $alerta = $linha2[1];

						  if(isset($_SESSION['msg'])){
			              echo $_SESSION['msg'];
			              unset($_SESSION['msg']);
			              }

						    //if ($alerta > 50){

						    //echo "<p class='alerta'> OBSERVE A QUANTIDADE ! = '$alerta'<audio src='erro.mp3' autoplay></audio> </p>";
					  //}
				   }