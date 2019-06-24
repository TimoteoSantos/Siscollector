<?php
session_start();
//receber os dados do formulário
$arquivo = $_FILES['arquivo'];
$banco = $arquivo['tmp_name'];

$servidor = $_POST['servidor'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$dbname = $_POST['dbname'];

//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

//Ler os dados do arquivo e converter em string
$dados = file_get_contents($banco);
//echo $dados;

//Executar as query do backup
mysqli_multi_query($conn, $dados);

header("Location: ../../../v_login.php");




