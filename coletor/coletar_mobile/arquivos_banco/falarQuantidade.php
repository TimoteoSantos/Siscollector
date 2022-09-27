<?php


	function falarQuantidade($qt){



		//pegar a quantidade de caracteres da quantidade
		//pode ser 2 3 ... numeros assim sabera se é und dezena ou centena.
		  $qt = $qt * 1; // 
          $tipo = strlen($qt);
         
         // se for unidade         
		 if($qt < 101)

		 { 

	    $arquivo = "$qt.mp3";
       return $_SESSION['msg'] = "<span class='alerta'><span><audio src='audio/"."$arquivo'" . "autoplay></audio> </span>";      
       
        }





/*
        //decimal de 20
        if ($qt > 19){

        $num =  str_split($qt);
     
        $dezena = $num[0] * 10;

        $num = $num[1];

        $arquivo1 = "$dezena.mp3";
        $arquivo2 = "$num.mp3";
        
        $_SESSION['msg'] = "<span class='alerta'><span><audio src='audio/"."$arquivo1'" . "autoplay></audio> </span>";
        $_SESSION['msg2'] = "<span class='alerta'><span><audio src='audio/"."$arquivo2'" . "autoplay></audio> </span>";
    }
   
      */  
	}