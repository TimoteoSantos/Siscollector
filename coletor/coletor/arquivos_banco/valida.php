<?php
session_start();
include_once("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'botao');
if($btnLogin){

	$usuario = filter_input(INPUT_POST, 'user');
	$senha = filter_input(INPUT_POST, 'senh');
	
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id, usuario, senha FROM usuarios WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conexao, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['usuario'] = $row_usuario['usuario'];
				
				header("Location: ../index.php");
			}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Usuário ou senha incorreto!</div>";
				header("Location: ../v_login.php");
			}
		}
	}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Usuário ou senha incorreto!</div>";
		header("Location: ../v_login.php");
	}
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Página não encontrada, procure suporte!</div>";
	header("Location: ../v_login.php");
}
