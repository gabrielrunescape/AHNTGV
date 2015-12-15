<?php
	include '../mysql/conn.php';
	
	$id_update = (int) $_GET['id_update'];
	//$tabela  = $_GET['tablitsa'];
	$update  = $_GET['update'];
	
	if (mysql_query("UPDATE comentarios SET aceito = '".$update."' WHERE id = ".$id_update)) {
		echo "<meta http-equiv='refresh' content='0; url=painel.php'>";
		exit;
	} else {
		echo mysql_error();
	}
?>