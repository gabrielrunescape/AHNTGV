<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Robots" content="All" />
		<meta name="Language" content="Portuguese" />
		<meta name="author" content="João Paulo dos Santos" />
		<meta name="keywords" content="movimento, sem, terra, ahnt, gv, governador, valadares, associação, habitacional, nova, terra, minha, casa, vida" />
	  	<meta name="description" content="<?= $title ?>">
		<title><?php echo $title ?></title>
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png"> 
        
		<link href="http://<?=$_SERVER['HTTP_HOST'] ?>/css/inicio.css" rel="stylesheet" />
		<link href="http://<?=$_SERVER['HTTP_HOST'] ?>/css/table_design.css" rel="stylesheet" />
        
		<script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/funcao.js"></script> 
		<script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/lightbox.js"></script>
        
		<link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST'] ?>/galery/css/organização.css" />
		<link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST'] ?>/galery/css/lightbox.css" />
        
		<!--SCRIPT PARA PEGAR UM WIDGET DE DATA-->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/datapicker-pt-BR.js"></script>
        
  		<script>
  			$(function() {
    			$( "#datepicker" ).datepicker();
  			});
  		</script>
	</head>
	<?php
		if (stripos($_SERVER['REQUEST_URI'], 'videos.php')) {
    ?>
	
    <body style="background: url('http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/corpo/video.jpg') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
    
	<?php
    	} else {
    ?>
    
	<body>
    
    <?php
		} 
    ?>
		<div id="wrapper">
        	<div id="cabeçalho">
            	<div class="rotulo">
                	<marquee hspace="85" behavior="scroll" scrollamount="5" direction="left" id="marquesina">
                    	ASSOCIAÇÃO HABITACIONAL NOVA TERRA - GOVERNADOR VALADARES / MINAS GERAIS - CONTATO:<a href="tel:+553332714962" id="back">(33) 3271 - 4962</a><!--</p>-->
                    </marquee>
				</div>
            	
            	<!-- Banner com imagens de todos os coordenadores juntos-->
            	<img id="banner" alt="Banner sloganAHNT" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/sloganAHNT.png" />
            
            	<?php				
					if (($_SERVER['REQUEST_URI'] == '/') || stripos($_SERVER['REQUEST_URI'], 'index.php') ) {
				?>
                
                <div id="slides">
                    <marquee  behavior="scroll" scrollamount="5" direction="left">
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/b1.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/b2.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/b3.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/b4.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/b5.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/b6.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/b7.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/b8.jpg" />
            
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/01.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/02.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/03.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/04.png" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/05.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/06.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/07.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/08.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/09.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/10.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/11.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/12.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/13.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/14.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/15.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/16.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/17.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/18.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/19.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/20.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/21.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/22.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/23.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/24.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/25.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/26.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/27.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/28.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/29.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/30.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/31.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/32.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/33.jpg" />
                        <img alt="imagem slide" width="360" height="200"  src="http://<?= $_SERVER['HTTP_HOST'] ?>/imagens/fotosAHNT_SL/34.jpg" />
                    </marquee>
                </div><!--FIM SLIDES-->
                <?php
					} 
				?>
                                	
				<div id="principaltopo"><!--logomarca e menus-->	                    
                    <nav class="mainNav"><!--construindo um menu-->
                        <ul>			
                            <li><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/" data-title="Home">Home</a></li>	
                            		
                            <li><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/quemsomos.php" data-title="Quem Somos">Quem Somos</a></li>
                            <li><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/coordenadores.php" data-title="Núcleos">Núcleos</a></li>			
                            <li><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/criterios.php" data-title="Participação">Participação</a></li>		
                            <li><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/conquistas.php" data-title="Conquistas">Conquistas</a></li>
                            <li><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/parceiros.php" data-title="Parceiros">Parceiros</a></li>			
                        </ul>
                    </nav>  
				</div><!--FIM PRINCIPALTOPO--> 
            </div> <!--FIM CABEÇALHO-->