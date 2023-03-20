<?php

	function VerificarCadastro($conexao, $codSql,$loja){

	$conmy = $conexao;
	$loja = $loja;

    $result = "SELECT * FROM precosloja where cod = '$codSql' AND loja = '$loja'";
    $resultado = mysqli_query($conmy, $result);

        while($linha = mysqli_fetch_array($resultado)){

             $codigo = $linha['cod'];

	return $codigo;

	}
}


