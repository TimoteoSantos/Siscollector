<?php
session_start();
//conexao
require 'conexao.php';

$id = $_GET['id'];
$user = $_GET['nome'];

//contar usuarios administradores
$listagem = mysqli_query($conexao,  "SELECT COUNT(id), tipo  FROM usuarios where tipo = 'adm'");
//contar
$contar = $listagem->fetch_row();
//pegar o valor
$todos = $contar;

//verificar o tipo da conta do usuario a ser excluido
$listagem = mysqli_query($conexao,  "SELECT tipo  FROM usuarios where id = $id");
//contar
$contar = $listagem->fetch_row();
//pegar o valor
$tipo = $contar;

//se se nao tiver coleta desse usuario
$listagem = mysqli_query($conexao,  "SELECT COUNT(id) FROM coletor_importar where usuario = '$user'");
//contar
$contar = $listagem->fetch_row();
//pegar o valor
$coleta_usuario = $contar;

//se nao tiver coleta desse usuario
if ($coleta_usuario[0] < 1) {

//se
if ($todos[0] != 1 or $tipo[0] == "") {

//exclui o id
$sql = "DELETE FROM usuarios WHERE id='$id' LIMIT 1";

mysqli_query($conexao, $sql); /*or die ("Erro:" .mysqli_error($conexao));*/

//auditoria
$usuario = $_SESSION['usuario'];
$data = date('Y-m-d  H:i:s');
$mensagem = utf8_decode ("Excluiu o usuário $user");

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', '$mensagem')";
mysqli_query($conexao, $sql);
//fim da autidoria

//enviar mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span>
Excluido!</div>";
header("Location: ../v_usuario.php");
exit();

//se so tiver um usuario
}else {

$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> ERRO! Você não pode excluir o único usuário adm!</div>";
header("Location: ../v_usuario.php");

}

}else {
//enviar mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span>
Esse usuário fez coleta! primeiro exclua a coleta depois poderá exclui-lo!</div>";

header("Location: ../v_usuario.php");

}