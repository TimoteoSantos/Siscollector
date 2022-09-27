<?php
session_start();
//conexao
require "conexao.php";

//apagar todos os dados da tabela zerando seu id tabela importar
$sql = "TRUNCATE coletor_importar";
mysqli_query($conexao, $sql);
//apagar todos os dados da tabela zerando seu id tabela exportar
$sql = "TRUNCATE coletor_exportar";
mysqli_query($conexao, $sql);

//desfaz configuracao 
$sql = "DELETE FROM config WHERE conf = '5'";

mysqli_query($conexao, $sql) or die ("Erro:" .mysqli_error($conexao));

//apagar as diferencas
$sql = "TRUNCATE diferenca";
mysqli_query($conexao, $sql);


//auditoria
$usuario = $_SESSION['usuario'];
$data = date('Y-m-d H:i:s');


$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', 'Excluiu dados processados e importados')";
mysqli_query($conexao, $sql);

//fim da autidoria

//enviando para a sessao a mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Importatos e coletados apagados!</div>";

header("Location: ../v_processar.php");