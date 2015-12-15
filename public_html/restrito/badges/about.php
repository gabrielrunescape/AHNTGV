<?php
	include '../../mysql/conn.php';
	include('../session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="Gabriel Fiipe de Souza Prado">
        <meta name="keywords" content="sobre, site, perfil, ahnt, gv, governador valadares, associação, habitacional, nova, terra">
	  	<meta name="description" content="Sobre o site - Associação Habitacional Nova Terra">
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png">
        <title>SOBRE O SITE - ASSOCIAÇÃO HABITACIONAL NOVA TERRA</title>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../css/css_responsivo.css" />
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
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/painel.php">INÍCIO</a>
                        </li>
                        <li>
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/perfil.php">PERFIL</a>
                        </li>
                        <li>
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/forum/">FÓRUM</a>
                        </li>
                        <li>
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/logout.php">SAIR</a>
                        </li>
                    </ul>
                </div><!--FIM COLLAPSER NAVBAR-COLLAPSE - CLASS-->
            </div><!--FIM CONTAINER-->
        </div><!--FIM NAVBAR NAVBAR-DEFAULT NAVBAR-STATIC-TOP - CLASS-->
        
        <div class="container" style="border-left: 1px solid #EEEEEE; border-right: 1px solid #EEEEEE; border-bottom: 1px solid #EEEEEE">
            <!--<div class="row">
                <div class="col-md-8">-->
                    <div class="well" style="margin: 20px auto">
                    	<h1 style="padding: 0; margin: 0;" class="text-success">Sobre o site</h1>
                        <hr>
                        
                        <form class="form-horizontal" role="form">
                            <p class="text-justify">
                                Este site foi desenvolvido com a finalidade de publicar informações sobre a associação habitacional nova terra, de governador Valadares, buscando atender com maior conforto aos seus associados, prestando-lhes múltiplas informações e tirando suas dúvidas a respeito da associação em geral, a fim de divulgar o projeto.
                            </p>
                            
                            <p class="text-justify">
                                O Associação Habitacional Nova Terra existe dede 2002 onde foi montado sua primeira diretoria no mesmo ano. Teve tal necessidade de haver uma divulgação do programa Minha Casa Minha Vida em conjunto à Associação Habitacional Nova Terra em Governador Valadares.
                            </p>

                            <p class="text-justify">
                                O projeto hoje na cidade é conhecido pelos resultados que vem sendo alcançados pela atual administração da Prefeitura Municipal de Governador Valadares com apoio do Governo Federal e Caixa Econômica Federal.
                            </p>

                            <hr />

                            <p>
                                Mais informações sobre a Assosiação Habitacional Nova Terra Governador Valadares visite as reuniões.
                            </p>
                        </form>
                    </div><!--FIM WELL - CLASS -->
                <!--</div>FIM COL-MD-8 - CLASS-->
            <!--</div>FIM ROW - CLASS-->
        </div><!--FIM CONTAINER - CLASS-->
      
        <footer class="section section-primary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="lead">Associação Habitacional Nova Terra - 2015</p>
                    </div>
                    
                    <div class="col-sm-6">
                        <ul class="lead list-inline text-right">
                            <li><a href="addCoordenador.php" style="color: #FFF;">Agregar usuário</a></li>
                            <li><a href="developers.php" style="color: #FFF;">Desenvolvedores</a></li>
                            <li><a href="about.php" style="color: #FFF;">Sobre</a></li>
                            <li><a href="terms.php" style="color: #FFF;">Termos de uso</a></li>
                        </ul>
                    </div><!--FIM COL-SM-6 - CLASS-->
                </div><!--FIM ROW - CLASS-->
            </div><!--FIM CONTAINER - CLASS-->
        </footer>
	</body>
</html>