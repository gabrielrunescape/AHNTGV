<?php
	include '../mysql/conn.php';
	include('session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="Gabriel Fiipe de Souza Prado">
        <meta name="keywords" content="área, administrativa, perfil, ahnt, gv, governador valadares, associação, habitacional, nova, terra" />
	  	<meta name="description" content="Painel- Associação Habitacional Nova Terra" />
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png" />
        <title>PAINEL - ASSOCIAÇÃO HABITACIONAL NOVA TERRA</title>
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/bootstrap.min.js"></script>
        <link href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/css_responsivo.css" />
        
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/funcao.js"></script>
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
                        <li class="active">
                            <a href="painel.php">INÍCIO</a>
                        </li>
                        <li>
                            <a href="perfil.php">PERFIL</a>
                        </li>
                        <li>
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/forum/">FÓRUM</a>
                        </li>
                        <li>
                            <a href="logout.php">SAIR</a>
                        </li>
                    </ul>
                </div><!--FIM COLLAPSER NAVBAR-COLLAPSE - CLASS-->
            </div><!--FIM CONTAINER-->
        </div><!--FIM NAVBAR NAVBAR-DEFAULT NAVBAR-STATIC-TOP - CLASS-->
        
        <div class="container" style="border-left: 1px solid #EEEEEE; border-right: 1px solid #EEEEEE; border-bottom: 1px solid #EEEEEE">
            <div class="row">
                <div class="col-md-3">                	
                	<?php						
						$ses_sql = mysql_query("SELECT nome, sobrenome, img FROM usuarios WHERE id_login = '$id_session'");
						$row = mysql_fetch_assoc($ses_sql);
					?>
                    
                    <h3 class="hidden-sm hidden-xs"><?= $row['nome'].' '.$row['sobrenome']; ?></h3>
                    <hr class="hidden-sm hidden-xs" />
                    <img alt="Imagem de perfil" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/perfil/<?php echo $row['img']; ?>" class="center-block hidden-sm hidden-xs img-responsive">
                    <br>
                    <hr class="hidden-sm hidden-xs" />
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success">
                            <a href="painel.php">INÍCIO</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="perfil.php">PERFIL</a>                            
                        </li>
                        
                        <li class="list-group-item">
                            <a href="perfiledit.php">EDITAR PERFIL</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="publicar.php">CRIAR PUBLICAÇÃO</a>
                        </li>

                        <li class="list-group-item">
                            <a href="forum/">FÓRUM</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="logout.php">SAIR</a>
                        </li>
                    </ul>
                    <hr />
                </div><!--FIM COL-MD-4 - CLASS-->
                
                <div class="col-md-9">
                    <ul class="nav nav-tabs" style="margin-top: 15px;">
                        <li>
                            <a href="#actio-1">COMENTÁRIOS</a>
                            <link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png" />
                        </li>
                        <li>
                            <a href="#actio-2">PUBLICAÇÕES</a>
                            <link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png" />
                        </li>
                        
                        <?php
							if ($privilegios == 'admin') {
	
	
	
						?>                        
                        <li>
                            <?php
                                $sql_count = mysql_query("SELECT * FROM comentarios WHERE aceito != 'sim'");
                                $count_aceitos = mysql_num_rows($sql_count);

                                if ($count_aceitos == 0) {
                                    echo '<a href="#actio-3">SOLICITAÇÕES</a>';
                                } else {
                                    echo '<a href="#actio-3">SOLICITAÇÕES ('.$count_aceitos.')</a>';
                                }
                            ?>
                            
                            <link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png" />
                        </li>
                        <?php
							}
						?>
                    </ul>

                    <div class="nav nav-justified content" style="border-left: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; margin-bottom: 15px;" id="actio-1">
                        <?php include '../mysql/pagina1.php'; ?>
                    </div><!--FIM NAV NAV-JUSTIFIED - CLASS-->
                    
                    <div class="nav nav-justified content" style="border-left: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; margin-bottom: 15px;" id="actio-2">
                        <?php include '../mysql/pagina2.php'; ?>
                    </div><!--FIM NAV NAV-JUSTIFIED - CLASS-->
                    
                    <?php
						if ($privilegios == 'admin') {
					?> 
                    
                    <div class="nav nav-justified content" style="border-left: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; margin-bottom: 15px;" id="actio-3">
                        <?php include '../mysql/pagina3.php'; ?>
                    </div><!--FIM NAV NAV-JUSTIFIED - CLASS-->
                       
                    <?php
						}
						
						if ($privilegios == 'admin') {
					?>
                    
					<script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/tabs.js"></script>
                    <script type="text/javascript">
                        activatables('tab', ['actio-1', 'actio-2', 'actio-3']);
                    </script>
                    
                    <?php
						} else {
					?>
                    
					<script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/tabs.js"></script>
                    <script type="text/javascript">
                        activatables('tab', ['actio-1', 'actio-2']);
                    </script>
                    
                    <?php
						}
					?>
                </div><!--FIM COL-MD-8 - CLASS-->
            </div><!--FIM ROW - CLASS-->
        </div><!--FIM CONTAINER - CLASS-->
      
        <footer class="section section-primary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="lead">Associação Habitacional Nova Terra - 2015</p>
                    </div>
                    
                    <div class="col-sm-6">
                        <ul class="lead list-inline text-right">
                            <li><a href="badges/addCoordenador.php" style="color: #FFF;">Agregar usuário</a></li>
                            <li><a href="badges/developers.php" style="color: #FFF;">Desenvolvedores</a></li>
                            <li><a href="badges/about.php" style="color: #FFF;">Sobre</a></li>
                            <li><a href="badges/terms.php" style="color: #FFF;">Termos de uso</a></li>
                        </ul>
                    </div><!--FIM COL-SM-6 - CLASS-->
                </div><!--FIM ROW - CLASS-->
            </div><!--FIM CONTAINER - CLASS-->
        </footer>
	</body>
</html>