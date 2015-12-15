<?php
	include('post.php'); // Includes Login Script

	if(isset($_SESSION['login_user'])){
		header("location: painel.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>ASSOIAÇÃO HABITACIONAL NOVA TERRA - LOGIN</title>
        <meta name="author" content="Gabriel Fiipe de Souza Prado">
        <meta name="keywords" content="login, ahnt, gv, governador valadares, associação, habitacional, nova, terra">
	  	<meta name="description" content="Login - Associação Habitacional Nova Terra">
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png">
		<link href="css/folha.css" rel="stylesheet" type="text/css" />
	</head>
    
	<body>
		<div class="externo">
            <div class="corpo">
                <div id="top">
                	<a href="http://<?=$_SERVER['HTTP_HOST'] ?>/">
                    	<img id="slg"src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/sloganAHNT.png"/>
                    </a>
                </div>
                
                <div id="center">
                	<form name="login" method="post">
                    <ul>
                    	<li><input id="usuario" type="text"  placeholder="Usuário" name="usuario"/> </li>
                    	<li><input id="senha" type="password"  placeholder="Senha" name="senha"/></li>
                        <li><span><?php echo $error; ?></span></li>
                    </ul>  
                </div>
                
                <div id="bottom">
                    <input type="submit" name="submit" id="entrar" value="ENTRAR" />
                	</form>
                </div>
              </div>
            </div>	  		
		</div>    	
	</body>
</html>