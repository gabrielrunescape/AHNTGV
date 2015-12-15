<?php 
	if (isset($_POST['botao-resenha'])) {
		include 'bootalert.php';

		$id = $_POST['id_nome'];	
		$id_post = $_POST['id_post'];	
		$resenha = $_POST['resenha'];	
		$data_res = date("Y-m-d H:i:s");
		
		$reg_coment = mysql_query("INSERT INTO resenhas (id, id_post, data, nome, comentario) VALUES (NULL, $id_post, '$data_res', $id, '$resenha')") or die(alertax('Erro - MySQL INSERT na tabela `resenhas`!', mysql_error()));


		echo "<meta http-equiv='refresh' content='0; url=painel.php#tab=actio-2'>";
		echo alertax('Mensagem enviada com sucesso!', 'Seu comentário foi feito com sucesso!');

		unset($_POST['botao-resenha']);
	}

	mysql_close();
?>