<?php 
	if (isset($_POST['botao'])) {
		$tipo = $_POST['tipo_mensagem'];
		$nome = $_POST['nome'];	
		$contato = $_POST['contato'];	
		$mensagem = $_POST['mensagem'];	
		
		if ($tipo != '' && $nome != '' && $contato != '' && $mensagem != '') {
			$reg_coment = mysql_query("INSERT INTO comentarios (id, tipo, data, nome, contato, comentario, aceito) VALUES (NULL, $tipo, CURRENT_TIMESTAMP, '$nome', '$contato', '$mensagem', 'não')") or die(mysql_error());
			
			echo "<meta http-equiv='refresh' content='0; url=avisos.php'>";
			echo "<script>alert('Mensagem enviada com sucesso! Sua mensagem só será exibida após aprovação do administrador.');</script>";
		} else {
			echo "<script>alert('Existem campos em branco!');</script>";
		}
	}
?>