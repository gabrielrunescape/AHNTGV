<?php
	include '../mysql/conn.php';
	include('session.php');
	include('../mysql/MascaraTelefone.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="Gabriel Fiipe de Souza Prado">
        <meta name="keywords" content="área, administrativa, perfil, ahnt, gv, governador valadares, associação, habitacional, nova, terra">
	  	<meta name="description" content="Perfil - Associação Habitacional Nova Terra">
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png">
        <title>INÍCIO - ASSOCIAÇÃO HABITACIONAL NOVA TERRA</title>
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/bootstrap.min.js"></script>
        <link href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/css_responsivo.css" />
        
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/funcao.js"></script>
		<script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/tinymce/tinymce.min.js"></script>
    	<script type="text/javascript">
        	tinymce.init({
            	selector: "#mytextarea",
				language: "pt_BR",
				height: 400,
				plugins: [
						"advlist autolink link image lists charmap print preview hr spellchecker responsivefilemanager",
						"searchreplace wordcount visualblocks visualchars code fullscreen media nonbreaking",
						"table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern "
				],
		
				toolbar1: "newdocument print | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect | preview",
				toolbar2: "undo redo | cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | link unlink image media code | responsivefilemanager ",
				toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | fullscreen | ltr rtl | spellchecker | forecolor backcolor",
						
				menubar: false,
				toolbar_items_size: 'small',
				
				image_advtab: true ,
   
			    external_filemanager_path:"/../filemanager/",
			    filemanager_title:"Responsive Filemanager" ,
			    xternal_plugins: { "filemanager" : "/../filemanager/plugin.min.js"}
        	});			
    	</script>
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
						$ses_sql = mysql_query("SELECT nome, sobrenome, img FROM usuarios WHERE id_login = '$id_session'", $connection);
						$row = mysql_fetch_assoc($ses_sql);
					?>
                    
                    <h3 class="hidden-sm hidden-xs"><?= $row['nome'].' '.$row['sobrenome']; ?></h3>
                    <hr class="hidden-sm hidden-xs" />
                    <img alt="Imagem de perfil" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/perfil/<?php echo $row['img']; ?>" class="center-block hidden-sm hidden-xs img-responsive">
                    <br />
                    <hr class="hidden-sm hidden-xs" />
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="painel.php">INÍCIO</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="perfil.php">PERFIL</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="perfiledit.php">EDITAR PERFIL</a>
                        </li>
                        
                        <li class="list-group-item list-group-item-success">
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
                    <div class="well" style="margin: 20px auto">
                    	<?php
							if (empty($_SERVER['QUERY_STRING'])) {
								$autor_post = $id_session;
								$titulo_post = '';
								$materia_post = '';
								
                    			echo '<form class="form-horizontal" role="form" method="post" action="post_send.php?action=insert">';
							} else {
								$id_post = $_GET['edit_post'];
								
								$queryx = mysql_query("SELECT titulo, materia FROM postagens WHERE id = '".$id_post."'");
								$num_rows = mysql_num_rows($queryx);
								
								if ($num_rows == 1 ) {
									$load = mysql_fetch_row($queryx);
									
									$autor_post = $login_session;
									$titulo_post = $load[0];
									$materia_post = $load[1];
									
									echo '<form class="form-horizontal" role="form" method="post" action="post_send.php?action=update">';
									echo '<input type="hidden" name="id_post"  value="'.$id_post.'" />';
								} else {
									echo "<meta http-equiv='refresh' content='0; url=http://".$_SERVER['HTTP_HOST']."/404.php'>";
									echo "<script>alert('Essa publicação não existe!');</script>";
								}
							}
						?>
                        
                        <h1 style="padding: 0; margin: 0;" class="text-success">CRIAR PUBLICAÇÃO</h1>
                        <hr>
                        <!-- AQUI FICA UM FOR -->  
                        	<div class="form-group">
                                <div class="col-sm-2">
                                    <label>Título da publicação: </label>
                                </div>
                                
                                <div class="col-sm-10">
                                    <input type="texto" name="titulo" class="form-control" value="<?= $titulo_post ?>"  />
                                    <input type="hidden" name="autor"  value="<?= $autor_post ?>" />
                                </div>
                            </div>
                            
                            <hr />
                            
                            <p>             
                                <textarea name="mytextarea" id="mytextarea"><?= $materia_post ?></textarea>
                            </p>
                            
                            
                            <p class="text-right">
                                <input type="submit" class="btn btn-primary" name="botao" value="ENVIAR" />
                            </p>
                        </form>
                        
                        <?php
							include 'post_send.php';
						?>
                    </div><!--FIM WELL - CLASS -->
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