<?php
//conexao com banco
require "../../coletor/arquivos_banco/conexao.php";


$query = ("INSERT INTO config (sessao) VALUES (1);") ;

mysqli_query($conexao, $query);


header('Location: ../v_configuracao.php');