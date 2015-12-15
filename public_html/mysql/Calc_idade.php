<?php
	function calc_idade($data_nascimento) {
		$data_nasc = explode('/', $data_nascimento);
		$data = date('d/m/Y');
		$data = explode("/", $data);
		$anos = $data[2] - $data_nasc[2];
		
		if ($data_nasc[1] >= $data[1]){
			if ($data_nasc[0] <= $data[0]){
				return $anos;
				break;
			} else {
				return $anos-1;
				break;
			} 
		} else {
			return $anos;
		} 
	}
?>