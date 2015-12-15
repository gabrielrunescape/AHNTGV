<?php
	include '../mysql/conn.php';
    include '../mysql/bootalert.php';
	
	$id_delete = (int) $_GET['id_drop'];
	$tabela  = $_GET['tablitsa'];
	$coluna  = $_GET['coluna'];
	
	if (mysql_query("DELETE FROM ".$tabela." WHERE ".$coluna." = ".$id_delete)) {
		echo "<meta http-equiv='refresh' content='0; url=painel.php'>";
		echo alertax('Aviso!', 'Excluido com sucesso!');
		exit;
	} else {
		echo mysql_error();
	}
?>