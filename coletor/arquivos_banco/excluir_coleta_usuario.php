<?php session_start();

//conexao
require 'conexao.php';

//contar a quantidade de registro processados
$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
		//conta a quandidade de linhas que carregaram e $listagem
$conta = $listagem->fetch_row();

$id2 = $conta;

//se tiver registro importado e se nao processou
if ($id[0] < 1 ) {

$usuario = $_GET['usuario'];

//excluir todos os dados da coleta de um usuario
$sql = "DELETE FROM coletor_importar WHERE usuario = '$usuario'";

mysqli_query($conexao, $sql) or die ("Erro:" .mysqli_error($conexao));

//auditoria
$user = $_SESSION['usuario'];
$data = date('Y-m-d H:i:s');
$mensagem = utf8_decode ("Excluiu a coleta de $usuario");

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$user','$data', '$mensagem')";
mysqli_query($conexao, $sql);
//fim da autidoria

header("Location: ../v_listar_usuarios_excluir.php");
exit();
MYSQLI_CLOSE($conexao);

//$id = $_GET['id'];// Ou POST, dependendo de id'";

//mysqli_query ($query);

} else {

//enviando para a sessao a mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'> <span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Importados apagados!</div>";

//direcionando para a index apos excluir os dados
	header("Location: ../v_importar_arquivo.php");
}