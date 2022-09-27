<?php

$usuario = $_SESSION['usuario'];


$nao_cadastrado = mysqli_query($conexao,  " SELECT COUNT(DISTINCT referencia) FROM coletor_importar where descricao = 'Produto nao cadastrado' and usuario = '$usuario' ");
$nao = $nao_cadastrado->fetch_row();

?>