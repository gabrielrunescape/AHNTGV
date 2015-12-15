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
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png" />
        <title>PERFIL - ASSOCIAÇÃO HABITACIONAL NOVA TERRA</title>
        <script type="http://<?=$_SERVER['HTTP_HOST'] ?>/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/bootstrap.min.js"></script>
        <link href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/css_responsivo.css" />
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
                        
                        <li class="list-group-item list-group-item-success">
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
                    <div class="well" style="margin: 20px auto">
                    	<?php					
							if (empty($_SERVER['QUERY_STRING'])) {
								$usr_perfil = $user_check;
							} else {
								$num_rows = mysql_num_rows(mysql_query("SELECT * FROM login WHERE username = '".$_GET['user']."'"));
								if ($num_rows == 1) {
									$usr_perfil = $_GET['user'];
								} else {
									$usr_perfil = $user_check;
								}
							}
							
							$user_check = $_SESSION['login_user'];
							$ses_sql = mysql_query("SELECT id FROM login WHERE username = '$usr_perfil'");
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
                        <hr>
                        
                        <form class="form-horizontal" role="form">
                            <div class="form-group form-horizontal">
                                <div class="col-sm-2">
                                    <label class="control-label">
                                    <?php
										$consulta = mysql_query("SELECT * FROM bairros WHERE id = $id_bairro");
										
										while($escreva = mysql_fetch_array($consulta)){
											$bairro = $escreva['bairro'];
											$região = $escreva['regiao'];
										}										
										
										if (!$região == '') {
											if ($região == 'Distrito Municipal') {
												echo 'Distrito: ';	
											} else {
												echo 'Bairro: ';
											}
										}
									?>
                                    </label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $bairro ?>" readonly="readonly" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Sexo:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $sexo ?>" readonly="readonly" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Aniversário:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= date("d/m/Y", strtotime($dt_nasc)); ?>" readonly="readonly" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Região:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $região.' de Governador Valadares, MG' ?>" readonly="readonly" />
                                </div>
                            </div>
                          </form>
                          
                          <hr>
                          
                          <form class="form-horizontal" role="form">
                              <div class="form-group">
                                  <div class="col-sm-2">
                                      <label class="control-label">Telefone:</label>
                                  </div>
                                  
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" value="<?php echo MascaraString($telefone); ?>" readonly="readonly" />
                                  </div>
                              </div>
                              
                              <div class="form-group">
                                  <div class="col-sm-2">
                                      <label class="control-label">Celular:</label>
                                  </div>
                                  
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" value="<?php echo MascaraString($celular); ?>" readonly="readonly" />
                                  </div>
                              </div>
                              
                              <div class="form-group">
                                  <div class="col-sm-2">
                                      <label class="control-label">E-mail:</label>
                                  </div>
                                  
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" value="<?= $email ?>" readonly="readonly" />
                                  </div>
                              </div>
                              <hr>
                              <h3 class="text-primary">Sobre <?php echo $nome; ?></h3>
                              <p class="text-justify"><?php echo nl2br($sobre); ?></p>
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