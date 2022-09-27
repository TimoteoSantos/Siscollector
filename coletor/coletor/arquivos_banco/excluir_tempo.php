<?php session_start();
//conexao
require 'conexao.php';

//excluir todos os dados da coleta de um usuario
$sql = "DELETE FROM config WHERE conf = '3'";

mysqli_query($conexao, $sql) or die ("Erro:" .mysqli_error($conexao));

header("Location: ../v_configuracao.php");

//auditoria
$usuario = $_SESSION['usuario'];
$data = date('Y-m-d H:i:s');
$mensagem = utf8_decode ('Excluiu o endereço da câmera');

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', '$mensagem')";
mysqli_query($conexao, $sql);
//fim da autidoria

exit();
MYSQLI_CLOSE($conexao);


