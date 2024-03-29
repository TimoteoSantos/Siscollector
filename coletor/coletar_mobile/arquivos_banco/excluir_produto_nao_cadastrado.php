<?php
session_start();

require '../../coletor/arquivos_banco/conexao.php';

//usar uma view para ver se já processou os dados
$listagem = mysqli_query($conexao,  "SELECT id from coletor_exportar");
//conta a quandidade de linhas que carregaram e $listagem
$contar = $listagem->fetch_row();
//recebe a quantidade de registros da tabela exportar
$id = $contar;

//se tiver registro na tabela exportar senao nao deixa baixar
if ($id[0] == 1 ) {

header("Location: ../index.php");
$_SESSION['msg'] = "<span> ERRO! COLETA ENCERRADA <span>";

} else {

$usuario = filter_var($_SESSION['usuario'], FILTER_SANITIZE_STRING);

$referencia = filter_var($_GET['referencia'], FILTER_SANITIZE_STRING);
$descricao = filter_var($_GET['descricao'], FILTER_SANITIZE_STRING);
$quantidade = filter_var($_GET['quantidade'], FILTER_SANITIZE_STRING);


$sql = "DELETE FROM coletor_importar WHERE referencia='$referencia' AND usuario = '$usuario'";


mysqli_query($conexao, $sql) or die ("Erro:" .mysqli_error($conexao));


//auditoria
$usuario = $_SESSION['usuario'];
$data = date('Y-m-d H:i:s');
$mensagem = utf8_decode ('Fonte: coletor_mobile EXCLUIU O PRODUTO ' .$referencia .' ' .$descricao .' ' .'QUANTIDADE = ' .$quantidade);

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', '$mensagem')";
mysqli_query($conexao, $sql);
//fim da autidoria

header("Location: ../listar_nao_cadastrado.php");
exit();
MYSQLI_CLOSE($conexao);

}