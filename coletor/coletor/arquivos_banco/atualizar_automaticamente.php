
<?php

require 'conexao.php';

$listagem = mysqli_query($conexao, "SELECT tempo  FROM config where conf = '3' limit 1 ");
					while($linha = mysqli_fetch_array($listagem)) {

						$tempo = $linha["tempo"];

?>


	<!--autalizar e fazer contagem-->
	<script type="text/javascript">

/*função para autalizar a pagina*/Redirect();
function Redirect()
{
	setTimeout("location.reload(true);", <?php echo $tempo  ?> );   
}

</script>


<?php } ?>





