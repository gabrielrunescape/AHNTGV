<?php
	include '../../mysql/conn.php';
	include('../session.php');
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
        <!--<div class="section">-->
        <div class="container">
        	<?php
				if ($privilegios != 'admin') {
			?>
            
            <div class="alert alert-danger alert-dismissable" style="margin: 30px auto">
                <strong>Alerta! </strong>Esse usuário não tem privilégios para essa operação.
                
                <p class="text-justify">
                	Caso seu nome de usuário <i><?= $login_session ?></i> seja um administrador e você não consegue acessar essa página contate o administrador ou os desenvolvedores do site.
                </p>
                
                <p class="text-justify">
                	Para realizar essa função o usuário deve ser administrador do site caso seu usuário não seja um administrador faça: <br />
                    <ol style="padding: 0; margin-left: 15px;">
                    	<li>Solicite ao administrador do site;</li>
                    	<li>Solicite aos desenvolvedores do site;</li>
                    	<li>Caso seja feita alguma alteração na associação o administrador notificará aos usuário por e-mail;</li>
                    </ol>
                </p>
                
                <p class="text-right">
                	<a class="btn btn-danger" onClick="history.back()">
                    	Voltar a página anterior
                	</a>
                </p>
            </div>
            
        	<?php
				} else {
			?>
            <div class="row">
                <div class="col-md-12 margin marginal">                                        
                    <h1 class="text-primary">Lista de usuários da Associação Habitacional Nova Terra</h1>
                    
                    <br />
                    
                    <p class="text-justify">
                        <span style="color: #F00; font-weight: bold;">AVISO: </span> Quaisquer mudanças feitas durante essa seção de administração dos usuários serão exibidas para o usuário. Caso seja necessario alguma mudança em algum usuário prossiga, pois as mudanças quando salva serão aplicada ao(s) usuário(s).
                    </p>
                    
                    <br />

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>LOGIN</th>
                                <th>NOME</th>
                                <th>SOBRENOME</th>
                                <th>BAIRRO</th>  
                                <th>TIPO DE USUÁRIO</th>                               
                                <th>×</th>                               
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
								$limite = 10; // LIMITE DE 3 RESULTADOS POR PÁGINA
						
								$SQL_COUNT = mysql_query("SELECT COUNT('id') FROM login");
								$SQL_RESUL = ceil(mysql_result($SQL_COUNT, 0) / $limite);
								
								$pg = (isset($_GET['pg'])) ? (int) $_GET['pg'] : 1;
								$start = ($pg - 1) * $limite; // FIM CONTADOR DE PÁGINAS
									
								$sql = "SELECT * FROM login ORDER BY username ASC LIMIT $start, $limite";
								
								$query = mysql_query($sql) or die(mysql_error());
								$qtda = mysql_num_rows($query);
								
								while ($obter = mysql_fetch_array($query)) {
									$nome = mysql_fetch_row(mysql_query("SELECT nome, sobrenome, id_bairro FROM usuarios WHERE id_login = ".$obter['id']));
									$bairro = mysql_fetch_row(mysql_query("SELECT bairro FROM bairros WHERE id = ".$nome[2]));
							?>
                            
                            <tr>
                                <td><?= $obter['username'] ?></td>
                                <td><?= $nome[0] ?></td>
                                <td><?= $nome[1] ?></td>
                                <td><?= $bairro[0] ?></td>
                                <td>
									<?php
										if ($obter['privilegios'] == 'admin') {
											echo 'Administrador';	
										} else {
											echo 'Usuário simples';
										}
									?>
                                </td>
                                
                                <td>
                                	<?php
										if ($obter['privilegios'] == 'admin') {
									?>
                                    <a href="confirm.php?confirm=<?= $obter['id'] ?>">
                                    <?php
										} else {
									?>
                                	<a href="confirm.php?confirm=<?= $obter['id'] ?>">
                                    <?php
										}
									?>
                                		<img src="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/trash-close.png" alt="Excluir tópico" />
                                    </a>
                                </td>                             
                            </tr>
                            
                            <?php
								}
							?>
                        </tbody>
                    </table>
                    
                    <?php
						if (!isset($_GET['t'])) {	
							if ($SQL_RESUL > 1 && $pg <= $SQL_RESUL) {
								echo '<ul class="pagination pagination-lg">';
								for ($i = 1; $i <= $SQL_RESUL; $i++) {
									echo '<li><a href="?pg='.$i.'">'.$i.'</a></li>';	
								}
								echo'</ul>';	
							}
						}
					?>
					
                    <br />
                </div>
            </div>            
            
        	<?php
				}
			?>
        </div>
        <!--</div>-->
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