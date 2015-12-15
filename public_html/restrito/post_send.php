<?php
	include '../mysql/conn.php';
    include '../mysql/bootalert.php';
	
	if (isset($_POST['botao'])) {
		if (($_POST['titulo'] != '') && ($_POST['autor'] != '') && ($_POST['mytextarea'] != '')) {
			$title = $_POST['titulo'];
			$lautor = $_POST['autor'];
			$texto = $_POST['mytextarea'];	
			$pdata = date ("Y-m-d H:i:s");		
						
			if ($_GET['action'] == 'insert') {
				$sql = mysql_query("INSERT INTO postagens (id, data, titulo, materia, autor) VALUES (NULL, '".$pdata."', '".$title."', '".$texto."', ".$lautor.")") or die ("<meta http-equiv='refresh' content='0; url=publicar.php'>".alertax('Erro INSERT na tabela `postagens`!', mysql_error().''));
			} else {
				if ($_GET['action'] == 'update') {
					$sql = mysql_query("UPDATE postagens SET data = '".$pdata."', titulo = '".$title."', materia = '".$texto."' WHERE id = ".$_POST['id_post']) or die ("<meta http-equiv='refresh' content='0; url=publicar.php'>".alertax('Erro UPDATE na tabela `postagens`!', mysql_error().''));
				}
			}
			if ($sql != mysql_error()) {
				echo "<meta http-equiv='refresh' content='0; url=painel.php#tab=actio-2'>";
				echo alertax('Aviso!', 'Publicação alterada com sucesso!');
			} else {
				echo alertax('Aviso!', 'Houve um erro durante o envio da publicação!');
			}
		} else {
			echo "<meta http-equiv='refresh' content='0; url=publicar.php'>";
			echo alertax('Aviso!', 'Existem campos em branco!');
		}
	}
?>