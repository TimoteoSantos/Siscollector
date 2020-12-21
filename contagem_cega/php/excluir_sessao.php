<?php
	session_start();
	require '../../coletor/arquivos_banco/conexao.php';

   $sessao = $_GET['sessao'];




   $sql = "DELETE FROM coletor_importar WHERE chave_sessao = '$sessao'";
    
    mysqli_query($conexao, $sql);

 
  
    $sql = "DELETE FROM sessao WHERE id_sessao = '$sessao'";
    
   mysqli_query($conexao, $sql);


//envia mensagem
	$_SESSION['msg'] = "<div class='alert alert-danger'>Sessão excluida!</div>";
	//redireciona
	header("Location: ../index.php");