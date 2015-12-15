<?php
	include '../mysql/conn.php';
	include '../mysql/bootalert.php';
	
	$enviar_arquivo = $_POST['enviar_arquivo'];
	
	if (isset($_POST['botao'])) {
		$id = (int) $_POST['id_session'];
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$id_bairro = (int) $_POST['bairro'];
		$sexo = $_POST['sexo'];
		$dt_nasc = $_POST['datepicker'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$sobre = $_POST['sobre'];
		
		$date = date('Y-m-d', strtotime(str_replace('/', '-', $dt_nasc)));
		
		$telefone = str_replace('(', '', $telefone);
		$telefone = str_replace(')', '', $telefone);
		$telefone = str_replace(' ', '', $telefone);
		$telefone = str_replace('-', '', $telefone);
		
		$celular = str_replace('(', '', $celular);
		$celular = str_replace(')', '', $celular);
		$celular = str_replace(' ', '', $celular);
		$celular = str_replace('-', '', $celular);

		if (($telefone == '' || $telefone == 0) && ($celular == ''|| $celular == 0)) {
			$query = mysql_query("UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', id_bairro = $id_bairro, sexo = '$sexo', dt_nasc = '$date', email = '$email', telefone = NULL, celular = NULL, sobre = '$sobre' WHERE id_login = $id") or die(alertax('Erro UPDATE na tabela `usuarios`!', ''.mysql_error()));
		} else {
			if ($telefone == '' || $telefone == 0) {
				$query = mysql_query("UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', id_bairro = $id_bairro, sexo = '$sexo', dt_nasc = '$date', email = '$email', telefone = NULL, celular = '$celular', sobre = '$sobre' WHERE id_login = $id") or die(alertax('Erro UPDATE na tabela `usuarios`!', ''.mysql_error()));
			} else if ($celular == ''|| $celular == 0) {
				$query = mysql_query("UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', id_bairro = $id_bairro, sexo = '$sexo', dt_nasc = '$date', email = '$email', telefone = '$telefone', celular = NULL, sobre = '$sobre' WHERE id_login = $id") or die(alertax('Erro UPDATE na tabela `usuarios`!', ''.mysql_error()));
			} else {
				$query = mysql_query("UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', id_bairro = $id_bairro, sexo = '$sexo', dt_nasc = '$date', email = '$email', telefone = '$telefone', celular = '$celular', sobre = '$sobre' WHERE id_login = $id") or die(alertax('Erro UPDATE na tabela `usuarios`!', ''.mysql_error()));
			}
		}



		if ($_GET['funcao'] == "gravar" && $enviar_arquivo == "nao") {
			echo "<meta http-equiv='refresh' content='0; url=perfiledit.php'>";	
			echo alertax('Aviso!', 'Dados alterados com sucesso!');
		} else if ($_GET['funcao'] == "gravar" && $enviar_arquivo == "sim" && is_file($_FILES['arquivo']['tmp_name'])) {
			$foto = $_POST['id'];
			
			$tipos = array("image/jpeg", "image/pjpeg", "image/jpeg", "image/pjpeg", "image/gif", "image/png", "");
			$arqType = $_FILES['arquivo']['type'];
					
			if (array_search($arqType, $tipos) === false) {
				echo "<meta http-equiv='refresh' content='0; url=perfiledit.php'>";
				echo alertax('Aviso - Erro durante o envio de imagem!', 'Formato de arquivo inválido!!');
			} else {		
				if (!move_uploaded_file($_FILES['arquivo']['tmp_name'], "../imagens/perfil/".$foto)) {
					echo "<meta http-equiv='refresh' content='0; url=perfiledit.php'>";
					echo alertax('Erro durante o envio da imagem!', 'Formato de arquivo inválido!!');
				} else {
					echo "<meta http-equiv='refresh' content='0; url=perfiledit.php'>";
					echo alertax('Aviso!', 'Imagem e dados alterados com sucesso! <br />Caso a imagem não venha a aparecer basta atualizar a página!');
				}
			}
		} else {
			echo "<meta http-equiv='refresh' content='0; url=perfiledit.php'>";
			echo alertax('Erro durante o envio da imagem!', 'Formato de arquivo inválido!!');
		}
	}
?>