<?php
	include '../../mysql/conn.php';
	include('../session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="Gabriel Fiipe de Souza Prado">
        <meta name="keywords" content="fórum, topicos, respostas, ahnt, gv, governador valadares, associação, habitacional, nova, terra">
	  	<meta name="description" content="Fórum - Associação Habitacional Nova Terra">
        <title>Fórum - Associação Habitacional Nova Terra</title>
        <link rel="stylesheet" href="css/css_forum.css" />
    </head>
    
    <body>
    	<header>
        	<div class="linha">
            	<span id="logo"><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/" target="_blank"><img src="../../imagens/corpo/sloganAHNT.png"/></a></span>
            	<nav id="menu">
                    <ul>
                        <li><a href="../index.php">INÍCIO</a></li>
                        <li><a href="../perfil.php">PERFIL</a></li>
                        <li><a href="../logout.php">SAIR</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <div id="body">
        	<table>
                <tr style="background: #252525; color: #FFF; font-size: 16px;">
                    <td>Tópico</td>
                    <td>Autor</td>
                    <td>Última mensagem</td>
                    <td>Respostas</td>
                </tr>
                <?php
					$query = mysql_query("SELECT * FROM topicos_forum ORDER BY data DESC");
					
					while ($obter = mysql_fetch_array($query)) {
				?>
                <tr style="background: #E8E8E8;">
                    <td><a href="?t=<?= $obter['idtopico'] ?>"><?= $obter['topico'] ?></a></td>
                    <td><?= $obter['autor'] ?></td>
                    <td>Xablau</td>
                    <td>69</td>
                </tr>
                <?php
					}
				?>
            </table>

        </div>
        
        <footer>
        	Esse é o rodapé
        </footer>
    </body>
</html>