<?php
//conexao com banco
require "../../coletor/arquivos_banco/conexao.php";


$sessao = $_GET['sessao'];

//$nome = "COND";


$query = ("UPDATE sessao SET status = 2  WHERE id_sessao = '$sessao';") ;

mysqli_query($conexao, $query);


header('Location: ../index.php');