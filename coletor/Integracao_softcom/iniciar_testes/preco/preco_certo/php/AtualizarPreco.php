<?php

require_once "conexaomysql.php";

function AtualizarPreco($conexao, $id, $preco, $loja, $data){

	$id = $id;
	$preco = $preco;
	$conexao = $conexao;
	$data = $data;

$result_usuario = "UPDATE precosloja SET preco = '$preco', data = '$data' WHERE cod = '$id' AND loja = '$loja'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

}