<?php
	include ('../mysql/conn.php');

	session_start();
	$error = "";

	if (isset($_POST['submit'])) {
		if (empty($_POST['usuario']) || empty($_POST['senha'])) {
			$error = 'Existem campos vazios!';
		} else {
			$username = $_POST['usuario'];
			$password = $_POST['senha'];

			$consulta = mysql_query("SELECT * FROM login WHERE username = '$username' AND password = '$password'") or die(mysql_error());

			$rows = mysql_num_rows($consulta);

			if ($rows == 1) {
				$_SESSION['login_user'] = $username;
				header("location: painel.php");
			} else {
				$error = 'Usuário ou senha inválido!';
			}

			mysql_close($conn);
		}
	}
?>