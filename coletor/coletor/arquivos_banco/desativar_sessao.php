<?php
//conexao com banco
require "../../coletor/arquivos_banco/conexao.php";


$sessao = $_GET['sessao'];

//$nome = "COND";


$query = ("DELETE FROM config WHERE sessao > 0;") ;

mysqli_query($conexao, $query);


header('Location: ../v_configuracao.php');