<?php
session_start();
//conexao com banco
require "conexao.php";


$sql = "DELETE FROM config WHERE (conf = 15 and estoque_loja = 0) or (conf = 15 and estoque_loja > 0)";

mysqli_query($conexao, $sql) or die ("Erro:" .mysqli_error($conexao));


//recebe o destino
$tempo = filter_var( $_POST['tempo'], FILTER_SANITIZE_STRING);

//inseri os valores recebidos nas variaveis acima
$query = "INSERT INTO config (conf, estoque_loja) VALUES ('15', '$tempo');" ;

mysqli_query($conexao, $query);

header("Location: ../v_configuracao.php");

