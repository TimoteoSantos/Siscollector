<?php

function converterDataMysql($data_hora){

		$data_hora = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $dataHora)));

		return $data_hora;

	}
