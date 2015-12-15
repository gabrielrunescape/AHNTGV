<?php 
	function MascaraString($string) {		
		  if (strlen($string) == 0) {
			  if (stripos($_SERVER['REQUEST_URI'], 'perfiledit.php')) {
				$mascara = '';
			  } else {
			  	$mascara = 'Sem número';
			  }
		  } else {
			if (strlen($string) < 9) {
				$mascara = "####-####";
			} else {
				if 	(strlen($string) < 11) {
					$mascara = "(##) ####-####";
				} else {
					$mascara = "(##) # ####-####";
				}
			}
		  }
		
		$string = str_replace(" ", "", $string);
	   
		for($i=0; $i < strlen($string); $i++){
			$mascara[strpos($mascara,"#")] = $string[$i];
		}
	   
		return $mascara;
	}
?>