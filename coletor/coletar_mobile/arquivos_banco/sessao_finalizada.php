<?php 


if (isset($sessao3)){

           $_SESSION['msg'] = "<span class='alerta'><span> Sessão foi finalizada :( <audio src='erro.mp3' autoplay></audio> </span>";
            header("Location: ../login.php");

}
