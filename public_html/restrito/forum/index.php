<?php
	include '../../mysql/conn.php';
	include('../session.php');
    include '../../mysql/bootalert.php';

    if (isset($_POST['cancelar'])) {
        Header("Location: index.php" );
    } 
    
    if (isset($_POST['criar'])) {
        $topico = $_POST['topico'];
        $xautor = $_POST['id_session'];
        $xdata = date ("Y-m-d H:i:s");
        
        $create_topico = mysql_query("INSERT INTO topicos_forum VALUES (NULL, '".$topico."', '".$xdata."' , '".$xautor."')");

        if ($create_topico != mysql_error()) {
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
            echo alertax('Tópico criado com sucesso!', 'Seu tópico de fórum foi feito com sucesso!');
        } else {
            echo alertax('Erro durante criar!', 'Houve um erro durante a criação do tópico! <br />Verifique as informações fornecidades durante a criação');
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
                    	<img alt="Logotipo da AHNT" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/logoAHNT.png" style="margin-top: 5px; padding: 0;" />
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
                        <li class="active">
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/forum/">FÓRUM</a>
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
            <div class="row">
                <div class="col-md-12 margin marginal">                                        
                    <?php 
                        if (isset($_GET['add'])) {
                    ?>

                    <div class="container" style="border-left: 1px solid #EEEEEE; border-right: 1px solid #EEEEEE; border-bottom: 1px solid #EEEEEE">
                        <div class="well" style="margin: 20px auto">
                            <h1 class="text-primary" style="padding: 0; margin: 0;" class="text-success">Fórum da Associação Habitacional Nova Terra</h1>
                            <hr />

                            <form class="form-horizontal" method="post" role="form">
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label text-left">Título do tópico:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="topico">
                                        <?php
                                            $user_check = $_SESSION['login_user'];
                                            $ses_sql = mysql_query("SELECT id FROM login WHERE username = '$user_check'");
                                            $valor_id = mysql_fetch_row($ses_sql);
                                        ?>

                                        <input type="hidden" id="id_session" name="id_session" value="<?php echo $valor_id[0]; ?>">
                                    </div>
                                </div>                                

                                <p></p>

                                <p class="text-right" style="margin: 0; padding: 0;">
                                    <input type="submit" class="btn btn-danger" name="cancelar" value="CANCELAR" />
                                    <input type="submit" class="btn btn-primary" name="criar" value="CRIAR TÓPICO" />
                                </p>
                            </form>
                        </div>
                    </div>

                    <?php
                        } else {
                    ?>

                    <h1 class="text-primary">Fórum da Associação Habitacional Nova Terra</h1>
                    <p class="text-justify">Esse fórum é voltado para discursão de temas, perguntas e respostas e
                        dúvidas dos Coordenadores/Usuáris da rede
                        <i>Associação Habitacional Nova Terra &nbsp;</i>registrados no sistema.
                        <br />
                        <br /> Para adicionar um tópico no fórum <a href="?add=t">clique aqui</a>.
                        <br />
                        <span style="color: #F00; font-weight: bold;">NOTA: </span>Para ler sobre as regras de uso do fórum
                        <a href="../badges/terms.php">clique aqui</a>.
                    </p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>TÓPICO</th>
                                <th>AUTOR</th>
                                <th>ÚLTIMA MENSAGEM</th>
                                <th>RESPOSTAS</th>                                
                                <?php
									if ($privilegios == 'admin') {
								?>
                                <th>×</th>
                                <?php
									}
								?>                                
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
								$limite = 10; // LIMITE DE 3 RESULTADOS POR PÁGINA
						
								$SQL_COUNT = mysql_query("SELECT COUNT('id') FROM topicos_forum");
								$SQL_RESUL = ceil(mysql_result($SQL_COUNT, 0) / $limite);
								
								$pg = (isset($_GET['pg'])) ? (int) $_GET['pg'] : 1;
								$start = ($pg - 1) * $limite; // FIM CONTADOR DE PÁGINAS
									
								$sql = "SELECT * FROM topicos_forum ORDER BY data DESC LIMIT $start, $limite";
								
								$query = mysql_query($sql) or die(mysql_error());
								$qtda = mysql_num_rows($query);
								
								while ($obter = mysql_fetch_array($query)) {
									$auteur = mysql_fetch_row(mysql_query("SELECT nome, sobrenome FROM usuarios WHERE id_login = (SELECT autor FROM topicos_forum WHERE idtopico = ".$obter['idtopico'].")"));
									$lastMSG = mysql_fetch_row(mysql_query("SELECT nome,sobrenome FROM usuarios WHERE id_login = (SELECT autor FROM respostas_forum WHERE id_topico = ".$obter['idtopico']." ORDER BY data DESC LIMIT 1)"));									
									$numMSG = mysql_num_rows(mysql_query("SELECT * FROM respostas_forum WHERE id_topico = ".$obter['idtopico']));
							?>
                            
                            <tr>
                                <td><a href="forum.php?t=<?= $obter['idtopico'] ?>"><?= $obter['topico'] ?></a></td>
                                <td><?= $auteur[0].' '.$auteur[1] ?></td>
                                <td><?= $lastMSG[0].' '.$lastMSG[1] ?></td>
                                <td><?= $numMSG ?></td>
                                <?php
									if ($privilegios == 'admin') {
								?>
                                <td>
                                	<a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/deletar.php?id_drop=<?= $obter['idtopico'] ?>&tablitsa=topicos_forum&coluna=idtopico">
                                		<img src="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/trash-close.png" alt="Excluir tópico" />
                                    </a>
                                </td>
                                <?php
									}
								?>                                
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

                    <?php
                        }
                    ?>
                </div>
            </div>
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