<?php 
	$conn = mysql_connect('localhost', 'ahnt', 'Senha123') or die(mysql_error());
    $banco = mysql_select_db('ahnt') or die(mysql_error());
	
	mysql_set_charset("utf8",$conn);

	date_default_timezone_set('America/Sao_Paulo');
?>