<?php

session_start();
require 'conexao.php';

$senha = filter_var(password_hash($_POST['senha'], PASSWORD_DEFAULT), FILTER_SANITIZE_STRING);

$ud = filter_var( $_POST['id'], FILTER_SANITIZE_STRING);
$user = filter_var( $_POST['nome'], FILTER_SANITIZE_STRING);

$id =  base64_decode($ud);

$result_usuario = "UPDATE usuarios SET senha = '$senha' WHERE id = '$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

//auditoria
$usuario = $_SESSION['usuario'];
$data = date('Y-m-d  H:i:s');
$mensagem = utf8_decode ("Alterou a senha do usuário $user");

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', '$mensagem')";
mysqli_query($conexao, $sql);
//fim da autidoria

//envia a mensagem de sucesso para a index
$_SESSION['msg'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok icones' aria-hidden='true'></span> Senha alterada com sucesso!</div>";

header("Location: ../v_usuario.php");
