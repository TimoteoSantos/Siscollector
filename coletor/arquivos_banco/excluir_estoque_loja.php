<?php session_start();

require 'conexao.php';

$sql = "DELETE FROM config WHERE estoque_loja > 0";

mysqli_query($conexao, $sql) or die ("Erro:" .mysqli_error($conexao));

$query = "INSERT INTO config (estoque_loja) VALUES ('3');" ;
mysqli_query($conexao, $query);

$usuario = $_SESSION['usuario'];
$data = date('Y-m-d H:i:s');
$mensagem = utf8_decode ('Excluiu exluiu ');

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', '$mensagem')";
mysqli_query($conexao, $sql);

header("Location: ../v_configuracao.php");

exit();
MYSQLI_CLOSE($conexao);