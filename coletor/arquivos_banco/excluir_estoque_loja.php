<?php session_start();

require 'conexao.php';

$sql = "DELETE FROM config WHERE (conf = 15 and estoque_loja = 0) or (conf = 15 and estoque_loja > 0)";

mysqli_query($conexao, $sql) or die ("Erro:" .mysqli_error($conexao));


header("Location: ../v_configuracao.php");

exit();
MYSQLI_CLOSE($conexao);