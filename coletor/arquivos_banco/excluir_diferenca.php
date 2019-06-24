<?php

session_start();

require "conexao.php";

$sql = "TRUNCATE diferenca";

mysqli_query($conexao, $sql);

$usuario = $_SESSION['usuario'];
$data = date('Y-m-d H:i:s');

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', 'Ecluiu as diferencas da coleta')";
mysqli_query($conexao, $sql);

//$result_usuario = "UPDATE coletar SET coleta = '0'";

//$resultado_usuario = mysqli_query($conexao, $result_usuario);

//desfaz configuracao 
$sql = "DELETE FROM config WHERE conf = '5'";

mysqli_query($conexao, $sql) or die ("Erro:" .mysqli_error($conexao));

$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> excluido</div>";

header("Location: ../v_baixar.php");