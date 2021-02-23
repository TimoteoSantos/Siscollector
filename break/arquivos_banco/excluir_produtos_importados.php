<?php
session_start();
//conexao
require '../../coletor/arquivos_banco/conexao.php';


//apagar todos os dados da tabela
$sql = "TRUNCATE vendas";
mysqli_query($conexao, $sql);

$sqld = "DELETE FROM config
WHERE total_venda IS NOT NULL";
mysqli_query($conexao, $sqld);


//enviando para a sessao a mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Produtos de pesquisa excluidos!</div>";

header("Location: ../index.php");
