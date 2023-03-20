<?php

	function VerificarCadastroMERC($conexao, $codSql){

	$conmy = $conexao;


    $result = "SELECT * FROM cadastro where codprod = '$codSql'";
    $resultado = mysqli_query($conmy, $result);

        while($linha = mysqli_fetch_array($resultado)){

             $codigo = $linha['codprod'];

	return $codigo;

	}
}


