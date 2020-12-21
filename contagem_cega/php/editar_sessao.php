<?php
//conexao com banco
require "../../coletor/arquivos_banco/conexao.php";


$sessao = filter_var( $_POST['sessao'], FILTER_SANITIZE_STRING);
$quantidade =  filter_var( $_POST['quantidade'], FILTER_SANITIZE_STRING);
$id_sessao = filter_var( $_POST['id_sessao'], FILTER_SANITIZE_STRING);



$query = ("UPDATE sessao SET nome = '$sessao', quantidade = '$quantidade'  WHERE id_sessao = '$id_sessao';") ;

mysqli_query($conexao, $query);


header('Location:../index.php');