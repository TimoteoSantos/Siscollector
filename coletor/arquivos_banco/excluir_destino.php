<?php session_start();
//conexao
require 'conexao.php';

//exclui o caminho da pasta para salvar os arquivos
$sql = "DELETE FROM config WHERE conf = '1'";

mysqli_query($conexao, $sql) or die ("Erro:" .mysqli_error($conexao));

//auditoria
$usuario = $_SESSION['usuario'];
$data = date('Y-m-d H:i:s');
$mensagem = utf8_decode ('Ecluiu o destino das pastas');

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', '$mensagem')";
mysqli_query($conexao, $sql);
//fim da autidoria

header("Location: ../v_configuracao.php");

exit();
MYSQLI_CLOSE($conexao);

