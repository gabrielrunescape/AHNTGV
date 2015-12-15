<?php
	$connection = mysql_connect("localhost", "ahnt", "Senha123");

	$db = mysql_select_db("ahnt", $connection);
	session_start();

	$user_check = $_SESSION['login_user'];

	$ses_sql = mysql_query("SELECT * FROM login WHERE username = '$user_check'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session = $row['username'];
	$id_session = $row['id'];
	$privilegios = $row['privilegios'];

	if(!isset($login_session)){
		mysql_close($connection); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
?>