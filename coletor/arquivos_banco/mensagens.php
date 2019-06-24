<div class="alert alert-secondary" role="alert">

  <!--mensagens na tela-->
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);

}
?>
 </div><!--fim das mensagens-->