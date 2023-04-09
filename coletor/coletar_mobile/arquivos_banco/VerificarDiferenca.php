<?php


function VerificarDiferenca($conexao,$usuario){


	$diferenca = false;
	$quantidade_coletada2 = 0;
	$referecia_coletada2 = 0;





		//se esta na loja ou no estoque se estiver na loja pode verificar

       $listagem = mysqli_query($conexao, "SELECT estoque_loja from config where estoque_loja > 0 ; ");

        while ($linha = mysqli_fetch_array($listagem))


        {




        // pegar o codigo de barras do ultimo item
       $listagem = mysqli_query($conexao, "SELECT max(id) as id from coletor_importar where usuario = '$usuario' ; ");

        while ($linha = mysqli_fetch_array($listagem))


        {

        	         $id = $linha['id'];
        	        

      	$listagem = mysqli_query($conexao, "SELECT id, referencia, quantidade from coletor_importar where id = '$id'; ");

        while ($linha = mysqli_fetch_array($listagem)){


        	$referecia_coletada2 = $linha['referencia'];
        	$quantidade_coletada2 = $linha['quantidade']; 


        }
    }



    	//verificar a quantidade dos produtos coletados
       $listagem = mysqli_query($conexao, "SELECT referencia, sum(quantidade) as quantidade,usuario , local_loja from coletor_importar where usuario = '$usuario' and referencia = '$referecia_coletada2' ; ");

        while ($linh = mysqli_fetch_array($listagem))

        {
        	$ref_impor = $linh['referencia'];

            $quantidade_coletada = $linh['quantidade'];
   
		}



		//verificar a quantidade do sistema
       $listagem = mysqli_query($conexao, "SELECT referencia, sum(quantidade) as quantidade from coletar where referencia = '$ref_impor'; ");

        while ($linha = mysqli_fetch_array($listagem))

        {

            $quantidade_coletar = $linha['quantidade'];

		}


		//se tem quantidade no sistema
		if($quantidade_coletar > -1){

	
		//se é tem diferenca
		if ($quantidade_coletar <> $quantidade_coletada){
			$diferenca = true;


		}}

		if($quantidade_coletada2 == 0){
			$diferenca = false;
		}

	//retorna diferenca
 return array($diferenca, $quantidade_coletada2);


}}