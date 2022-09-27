<?php
require 'conexao.php';

// pega o usuario logado
$usuario = $_SESSION['usuario'];

//buscaa esse usuario no banco
$listagem = mysqli_query($conexao,"SELECT * from usuarios  where usuario = '$usuario' ;");

while($linha = mysqli_fetch_array($listagem))

	{
		//$usuarios = $linha['usuario'];
		$tipo = $linha ['tipo'];//pega o tipo da conta do usuario
			
		//se o usuario nao e um administrador
		if ($tipo <> 'adm')

		{	//direciona para coletar
			header("Location: ../coletar_mobile/index.php");
			
		}
		
	}

//verificar se esta logado
if(!empty($_SESSION['id'])){

//senao estiver		
}else{

	//$_SESSION['msg'] = "Área restrita";
	header("Location: v_login.php");	
}