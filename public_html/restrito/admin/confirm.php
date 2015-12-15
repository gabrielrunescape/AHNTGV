<?php
	include '../../mysql/conn.php';
	include('../session.php');
	
	$mensagem = '';
	
	if (isset($_POST['cancelar'])) {
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	
	if (isset($_POST['excluir'])) {
		$senha = $_POST['senha'];
		$idx = $_GET['confirm'];

		$sqlx = mysql_query("SELECT * FROM login WHERE id = ".$idx);
		$del = mysql_fetch_assoc($sqlx);
		
		if ($del['privilegios'] == 'admin') {
			$passe = $del['password'];			
		} else {
			$consulta = mysql_query("SELECT * FROM login WHERE id = ".$id_session) or die(mysql_error());
			$td2 = mysql_fetch_assoc($consulta) or die(mysql_error());
			
			$passe = $td2['password'];	
		}
		
		if ($senha == $passe) {
			$create_topico = mysql_query("DELETE FROM usuarios WHERE id_login = ".$idx);
	
			if ($create_topico != mysql_error()) {
				echo "<meta http-equiv='refresh' content='0; url=index.php'>";
				echo "<script>alert('Usuário excluído com sucesso!');</script>";
			} else {
				echo "<script>alert('Houve um erro durante a criação do tópico!');</script>";
			}
		} else {
			$mensagem = 'Senha incorreta!';
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">   
    <head>
        <title>FÓRUM - ASSOCIAÇÃO HABITACIONAL NOVA TERRA</title>
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="Gabriel Fiipe de Souza Prado" />
        <meta name="keywords" content="forum, ahnt, gv, governador valadares, associação, habitacional, nova, terra" />
	  	<meta name="description" content="Painel- Associação Habitacional Nova Terra" />
		<script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/bootstrap.min.js"></script>
        <link href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/css_responsivo.css">
    </head>
    
    <body>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/" target="_blank">
                    	<img alt="Logotipo da AHNT" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/logoAHNT.png" style="margin: 5px 0px; padding: 0;" />
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../">INÍCIO<br></a>
                        </li>
                        <li>
                            <a href="../perfil.php">PERFIL</a>
                        </li>
                        <li>
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/forum/">FÓRUM</a>
                        </li>
                        <li class="active">
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/admin/">USUÁRIOS</a>
                        </li>
                        <li>
                            <a href="../logout.php">SAIR</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <?php
			if (isset($_GET['confirm'])) {
				$idx = $_GET['confirm'];
		?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-dismissable alert-warning">
                            <strong>AVISO: </strong>Você deseja excluir o usuário: <br />
                            
                            <br />
                            <?php
								$sqlx = mysql_query("SELECT * FROM login WHERE id = ".$idx);
								$del = mysql_fetch_assoc($sqlx);
								
								echo '<strong>USUÁRIO: </strong>'.$del['username'].'<br />';
								echo '<strong>PRIVILÉGIO DO USUÁRIO: </strong>'.$del['privilegios'].'<br />';
							?>
                            
                            <form class="form-horizontal" method="post" role="form" style="margin-top: 20px;">
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label">
                                        	<?php
												if ($del['privilegios'] == 'admin') {
													echo 'Senha do usuário: ';
												} else {
													echo 'Sua senha: ';
												}
											?>
                                        </label>
                                    </div>
                                    
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="senha" placeholder="Digite a senha" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-2">
                                    	<label class="control-label text-danger"><?= $mensagem ?></label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    	<p class="text-right">
                                        	<input type="submit" name="cancelar" class="btn btn-danger" value="CANCELAR" />
                                        	<input type="submit" name="excluir" class="btn btn-success" value="EXCLUIR" />
                                        </p>
                                    </div>
                                </div>                                
                            </form>
                            
                            <?php
								/*if (isset($_POST['cancelar'])) {
									echo "<meta http-equiv='refresh' content='0; url=index.php'>";
								} 
								
								if (isset($_POST['excluir'])) {
									$senha = $_POST['senha'];
									//$idx = $_GET['confirm'];
									
									if ($del['privilegios'] == 'admin') {
										$passe = $del['password'];			
									} else {
										$consulta = mysql_query("SELECT password FROM login WHERE id = ".$id_session) or die(mysql_error());
										$td2 = mysql_fetch_row($consulta) or die(mysql_error());
										
										$passe = $td2[0];	
									}
									
									if ($senha == $passe) {
										$create_topico = mysql_query("DELETE FROM usuarios WHERE id_login = ".$idx);
								
										if ($create_topico != mysql_error()) {
											echo "<meta http-equiv='refresh' content='0; url=index.php'>";
											echo "<script>alert('Usuário excluído com sucesso!');</script>";
										} else {
											echo "<script>alert('Houve um erro durante a criação do tópico!');</script>";
										}
										$mensagem = 'Senha incorreta! 1';
									} else {
										$mensagem = 'Senha incorreta! 2';
									}
								}*/
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
			}
		?>
        
        <footer class="section section-primary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="lead">Associação Habitacional Nova Terra - 2015</p>
                    </div>
                    <div class="col-sm-6">
                        <ul class="lead list-inline text-right">
                            <li><a href="../badges/addCoordenador.php" style="color: #FFF;">Agregar usuário</a></li>
                            <li><a href="../badges/developers.php" style="color: #FFF;">Desenvolvedores</a></li>
                            <li><a href="../badges/about.php" style="color: #FFF;">Sobre</a></li>
                            <li><a href="../badges/terms.php" style="color: #FFF;">Termos de uso</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>