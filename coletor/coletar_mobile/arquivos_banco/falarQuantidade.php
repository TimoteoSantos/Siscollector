<?php


	function falarQuantidade($qt){


		  $qt = $qt * 1; // 
          $tipo = strlen($qt);
         
         // se for unidade         
		 if($qt < 101)

		 { 

	    $arquivo = "$qt.mp3";
       return $_SESSION['msg'] = "<span class='alerta'><span><audio src='audio/"."$arquivo'" . "autoplay></audio> </span>";      
       
        }

	}