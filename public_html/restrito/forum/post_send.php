<?php
	include '../../mysql/conn.php';
    include '/../../mysql/bootalert.php';
	
	if (isset($_POST['botao'])) {
		$topico = $_POST['id_topico'];
		$resposta = $_POST['mytextarea'];
		$autor = $_POST['autor'];
		$pdata = date("Y-m-d H:i:s");
		
		$txt = '<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p><span style="font-size: 14pt; color: #333333;">Para melhor visualiza&ccedil;&atilde;oo de imagens nos f&oacute;runs <span style="text-decoration: underline;">&eacute; recomendado resolu&ccedil;&atilde;o ajustada m&aacute;xima</span> de <span style="color: #008000;"><strong>840px</strong></span> na <span style="text-decoration: underline;">largura da imagem</span>.</span></p>
</body>
</html>';
		
		if ($resposta == $txt) {
			echo "<meta http-equiv='refresh' content='0; url=forum.php'>";
			echo alertax('Aviso!', 'Existem campos em branco!');
		} else {
			$sql = mysql_query("INSERT INTO respostas_forum (idresposta, id_topico, data, autor, resposta) VALUES (NULL, ".$topico.", '".$pdata."', ".$autor.", '$resposta')") or die ("<meta http-equiv='refresh' content='0; url=index.php'><script>alert('".mysql_error()."');</script>");
			
			if ($sql != mysql_error()) {
				echo "<meta http-equiv='refresh' content='0; url=index.php'>";
				echo alertax('Aviso!', 'Publicação adicionada com sucesso!');
			} else {
				echo alertax('Aviso de Erro!', 'Houve um erro durante o envio da publicação!');
			}
		}
	}
?>