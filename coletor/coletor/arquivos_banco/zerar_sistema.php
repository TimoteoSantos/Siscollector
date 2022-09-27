<?php
session_start();
//conexao
require "conexao.php";

//apagar todos os dados da tabela zerando seu id tabela importar
$sql = "TRUNCATE auditoria";
mysqli_query($conexao, $sql);
//apagar todos os dados da tabela zerando seu id tabela exportar
$sql = "TRUNCATE coletor_exportar";
mysqli_query($conexao, $sql);
$sql = "TRUNCATE coletor_importar";
mysqli_query($conexao, $sql);
$sql = "TRUNCATE diferenca";
mysqli_query($conexao, $sql);
$sql = "TRUNCATE pdf";
mysqli_query($conexao, $sql);
$sql = "TRUNCATE coletar";
mysqli_query($conexao, $sql);

//auditoria
$usuario = $_SESSION['usuario'];
$data = date('Y-m-d H:i:s');

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', 'zerou o sistema')";
mysqli_query($conexao, $sql);

//fim da autidoria

//enviando para a sessao a mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Zerado!</div>";

header("Location: ../index.php");