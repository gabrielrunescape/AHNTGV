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
                        
                        <li class="list-group-item list-group-item-success">
                            <a href="perfiledit.php">EDITAR PERFIL</a>
                        </li>

                        <li class="list-group-item">
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
                    <div class="well" style="margin: 20px auto">
                    	<?php
							$user_check = $_SESSION['login_user'];
							$ses_sql = mysql_query("SELECT id FROM login WHERE username = '$user_check'");
							$valor_id = mysql_fetch_row($ses_sql);
							
							$query = mysql_query("SELECT * FROM usuarios WHERE id_login = $valor_id[0]");
							
							while($write = mysql_fetch_array($query)){
								$nome = $write['nome'];
								$sobrenome = $write['sobrenome'];
								$sexo = $write['sexo'];
								$dt_nasc = $write['dt_nasc'];
								$email = $write['email'];
								$id_bairro = $write['id_bairro'];
								$telefone = $write['telefone'];
								$celular = $write['celular'];
								$sobre = $write['sobre'];
							}
						?>
                        
                        <h1 style="padding: 0; margin: 0;" class="text-success"><?= $nome.' '.$sobrenome; ?></h1>
                        <hr />
                        
                        <form class="form-horizontal" role="form" action="funcao.php?funcao=gravar" method="post" name="form1" enctype="multipart/form-data">                        
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Nome:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="nome" class="form-control" value="<?= $nome ?>" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Sobreome:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="sobrenome" class="form-control" value="<?= $sobrenome ?>" />
                                </div>
                            </div>
                            
                            <div class="form-group form-horizontal">
                                <div class="col-sm-2">
                                    <label class="control-label">Bairro:</label>
                                </div>
                                <div class="col-sm-10">
                                    <div class="styled-select" >
                                    	<select name="bairro"><!-- class="btn-group dropdown-menu" role="menu"-->
                                            <?php 
												$result = mysql_query('SELECT id, bairro FROM bairros ORDER BY bairro ASC');
											
												while($ligne = mysql_fetch_array($result)){
													if ($id_bairro == $ligne[0]) {
														echo '<option selected="selected" value="'.$ligne[0].'">'.$ligne[1].'</option>';	
													} else {																								
														printf('<option value="%s">%s</option>', $ligne[0], $ligne[1]);
													}
												}
											?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Sexo:</label>
                                </div>
                                <div class="col-sm-10">
                                    <div class="styled-select" >
                                        <select name="sexo"><!-- class="btn-group dropdown-menu" role="menu"-->
                                            <?php 
                                                $sex = array("Feminino", "Masculino", "Outro");
                                            
                                                for ($i = 0; $i < 3; $i++) {
                                                    if ($sex[$i] == $sexo) {
                                                        echo'<option selected="selected" value="'.$sexo.'">'.$sexo.'</option>'; 
                                                    } else {
                                                        echo'<option value="'.$sex[$i].'">'.$sex[$i].'</option>';
                                                    }
                                                }                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label text-left">Data de nasc.:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  id="datepicker" name="datepicker" value="<?php echo date("d/m/Y", strtotime($dt_nasc)); ?>" />
                                </div>
                            </div>
                                                                                  
                            <hr />
                          
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Telefone:</label>
                                </div>
                                
                                <div class="col-sm-10">
                                    <input type="text" name="telefone" class="form-control" value="<?php echo MascaraString($telefone); ?>" />
                                </div>
                            </div>
                              
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Celular:</label>
                                </div>
                                
                                <div class="col-sm-10">
                                    <input type="text" name="celular" class="form-control" value="<?php echo MascaraString($celular); ?>" />
                                </div>
                            </div>
                              
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">E-mail:</label>
                                </div>
                                
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" value="<?= $email ?>" />
                                </div>
                            </div>

                            <hr />

                            <h3 class="text-primary">Sobre <?php echo $nome; ?></h3>
                            <textarea name="sobre" id="sobre"><?php echo nl2br($sobre); ?></textarea>

                            <input type="hidden" id="id_session" name="id_session" value="<?php echo $valor_id[0]; ?>">
                            
                            <h4 class="text-primary hidden-sm hidden-xs">
                            	Deseja substituir a imagem?   
                                <input class="hidden-sm hidden-xs" name="enviar_arquivo" type="radio" onClick="document.form1.arquivo.disabled=true" value="nao" checked="checked" />Não 
                                <input class="hidden-sm hidden-xs" name="enviar_arquivo" type="radio" onClick="document.form1.arquivo.disabled=false" value="sim" />Sim</h4>  						
                                <input class="hidden-sm hidden-xs" type="hidden" id="id" name="id" value="<?php echo $row['img']; ?>" />
                                <input class="hidden-sm hidden-xs" type="file" class="btn btn-default btn-sm" name="arquivo" disabled="disabled" />
                            
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