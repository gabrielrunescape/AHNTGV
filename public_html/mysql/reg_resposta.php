<?php 
	if (isset($_POST['botao'])) {
		$id_sessão = $_POST['id'];	
		$id_coment = $_POST['id_coment'];	
		$resposta = $_POST['resposta'];	
		$data_resp = date ("Y-m-d H:i:s");
		
		/*$nome_query = mysql_query("SELECT nome, sobrenome FROM usuarios WHERE id_login = '$id_sessão'");
		
		while($loop = mysql_fetch_array($nome_query)){
			$xNome = $loop['nome'];
			$xSobrenome = $loop['sobrenome'];
		}
		
		$nome = $xNome.' '.$xSobrenome;*/
		
		$reg_coment = mysql_query("INSERT INTO respostas (id, id_comentario, data, nome, resposta) VALUES (NULL, '$id_coment', '$data_resp', '$id_sessão', '$resposta')") or die(mysql_error());
		
		mysql_close();

		echo "<meta http-equiv='refresh' content='0; url=painel.php#tab=actio-1'>";
		echo "<script>alert('Mensagem enviada com sucesso!');</script>";		
	}
?>