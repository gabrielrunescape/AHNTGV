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
                        <img alt="Logotipo da AHNT" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/logoAHNT.png" style="margin: 5px 0px; padding: 0;" />
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
                    	<h1 style="padding: 0; margin: 0;" class="text-success">Sobre os desenvolvedores</h1>
                        <hr>
                        
                        <form class="form-horizontal" role="form">
                            <p class="text-justify lead">
                                <label class="control-label">
                                    Nome: 
                                </label>

                                Gabriel Filipe de Souza Prado
                            </p>

                            <p class="text-justify lead">
                                <label class="control-label">
                                    Idade: 
                                </label>

                                18 anos
                            </p>

                            <p class="text-justify lead">
                                <label class="control-label">
                                    Ocupação: 
                                </label>

                                Estudante
                            </p>

                            <p class="text-justify lead">
                                <label class="control-label">
                                    Formação: 
                                </label>

                                <br />Bacharelado em Sistemas de Informação, 2º período, UNIVALE 
                                <br />Técnico Em Informática, concluído em março 2015, PRONATEC – Escola Estadual Professor Nelson De Sena
                            </p>

                            <p class="text-justify lead">
                                <label class="control-label">
                                    E-mail: 
                                </label>

                                <a href="mailto:gabrielfilipbrazil@gmail.com">gabrielfilipbrazil@gmail.com</a>
                            </p>

                            <p class="text-justify lead">
                                <label class="control-label">
                                    Telefone: 
                                </label>

                                (33) 9969-3414
                            </p>

                            <p class="text-justify lead">
                                <label class="control-label">
                                    Principais atividades (Tecnologia da Informação): 
                                </label>

                                <br /><b><i>Banco de dados</i>:</b> MySQL e PostegreSQL 
                                <br /><b><i>Programação Desktop</i>:</b> C/C++, C#, Java EE e Java SE
                                <br /><b><i>Programação Web</i>:</b> CSS, HTML, PHP 
                            </p>

                            <hr />

                            <p class="text-justify lead">
                                <label class="control-label">
                                    Nome: 
                                </label>

                                João Paulo dos Santos
                            </p>

                            <p class="text-justify lead">
                                <label class="control-label">
                                    Idade: 
                                </label>

                                17 anos
                            </p>

                            <p class="text-justify lead">
                                <label class="control-label">
                                    Ocupação: 
                                </label>

                                Cantor e Estudante
                            </p>
                            <p class="text-justify lead">
                                <label class="control-label">
                                    Formação: 
                                </label>

                                <br />Técnico Em Informática, concluído em março 2015, PRONATEC – Escola Estadual Professor Nelson De Sena
                                <br />Ensino médio, 3º ano – Escola Estadual Professor Nelson De Sena 
                            </p>

                            <p class="text-justify lead">
                                <label class="control-label">
                                    E-mail: 
                                </label>

                                <a href="mailto:jpaulodossantos@outlook.com">jpaulodossantos@outlook.com</a>
                            </p>

                            <p class="text-justify lead">
                                <label class="control-label">
                                    Telefone: 
                                </label>

                                (33) 8854 - 4594
                            </p>


                            <p class="text-justify lead">
                                <label class="control-label">
                                    Principais atividades (Tecnologia da Informação): 
                                </label>

                                <br /><b><i>Banco de dados</i>:</b> MySQL e PostegreSQL 
                                <br /><b><i>Programação Desktop</i>:</b> Delphi e Java SE
                                <br /><b><i>Programação Web</i>:</b> CSS, HTML, JavaScript 
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