<?php
	include '../mysql/conn.php';
	include('session.php');
    include '../mysql/bootalert.php';   

    $conf_senha = $_POST['conf_senha'];

    if (isset($_POST['botao']) && $conf_senha == "sim") {
        $passatual = $_POST['passatual'];
        $password = $_POST['password'];
        $senha = $_POST['senha'];

        $dbPass = mysql_fetch_row(mysql_query("SELECT password FROM login WHERE id = ".$id_session));

        if ($passatual == $dbPass[0]) {
            if ($password != $senha) {
                echo alertax('Erro de senha', 'Senha inválida! <br />Sua nova senha é diferente da confirmação da senha.');
            } else {
                $alteração = mysql_query("UPDATE login SET password = '".$senha."' WHERE id = ".$id_session) or die(alertax('Erro UPDATE na tabela `login`!', ''.mysql_error()));

                if (mysql_error()) {
                    echo alertax('Erro UPDATE na tabela `login`!', ''.mysql_error());
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=perfil.php'>";
                    echo alertax('Aviso!', 'Senha alterada com sucesso!');
                }
            }
        } else {
            echo alertax('Erro de senha', 'Senha inválida! <br />Por favor tente novamente.');
        }
    } 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="Gabriel Fiipe de Souza Prado">
        <meta name="keywords" content="área, administrativa, editar, perfil, ahnt, gv, governador valadares, associação, habitacional, nova, terra">
	  	<meta name="description" content="Perfil - Associação Habitacional Nova Terra">
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png">
        <title>EDITAR PERFIL - ASSOCIAÇÃO HABITACIONAL NOVA TERRA</title>
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/bootstrap.min.js"></script>
        <link href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/css_responsivo.css" />  
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<script src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/datapicker-pt-BR.js"></script>
  		<script>
  			$(function() {
    			$( "#datepicker" ).datepicker();
  			});

            function HideNone(valor) {
                document.getElementById("senhaDiv").style.display = valor;
            }
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
                        <img alt="Logotipo da AHNT" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/logoAHNT.png" style="margin-top: 5px; padding: 0;" />
                    </a>
                </div>
                
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="painel.php">INÍCIO</a>
                        </li>
                        <li class="active">
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
                            <a href="mudarsenha.php">ALTERAR SENHA</a>
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
                    <div class="well" style="margin: 50px auto">
                    	<form class="form-horizontal" role="form" method="post" name="form1">                        
                            <h4 class="text-primary hidden-sm hidden-xs">
                                Deseja substituir sua senha?   
                                <input class="hidden-sm hidden-xs" name="conf_senha" type="radio" onClick="HideNone('none')" value="nao" checked="checked" />Não 
                                <input class="hidden-sm hidden-xs" name="conf_senha" type="radio" onClick="HideNone('block')" value="sim" />Sim
                            </h4>

                            <div id="senhaDiv" style="display: none;">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Senha atual:</label>
                                    </div>
                                    
                                    <div class="col-sm-9">
                                        <input type="password" name="passatual" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Nova senha:</label>
                                    </div>
                                    
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Confirmar senha:</label>
                                    </div>
                                    
                                    <div class="col-sm-9">
                                        <input type="password" name="senha" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <p class="text-right">
                            	<input type="submit" class="btn btn-primary" name="botao" value="ENVIAR" />
                            </p>
                        </form>
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