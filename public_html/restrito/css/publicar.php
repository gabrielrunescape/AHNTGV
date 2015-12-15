<?php
	include '../mysql/conn.php';
	include('session.php');
	include('../mysql/MascaraTelefone.php');
?>

<html>
 	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 	<link rel="stylesheet" href="css/painel.css">
        <meta name="author" content="Gabriel Fiipe de Souza Prado">
        <meta name="keywords" content="área, administrativa, publicar, ahnt, gv, governador valadares, associação, habitacional, nova, terra">
	  	<meta name="description" content="Editar perfil - Associação Habitacional Nova Terra">
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png"> 
        <title>Perfil - Área Administrativa</title>
        
        <link href="css/tabs.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/funcao.js"></script>
		<script src="ckeditor/ckeditor.js"></script>
	</head>
	
    <body>
       	<header class="cabeçalho">
        	<div class="linha">
            	<span id="logo"><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/" target="_blank"><img src="../imagens/corpo/sloganAHNT.png"/></a></span>
            	<nav id="menu">
                    <ul>
                        <li><a href="index.php">INÍCIO</a></li>
                        <li><a href="perfil.php">PERFIL</a></li>
                        <li><a href="logout.php">SAIR</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <div id="corpo">
            <div id="perfil">
                <ul>
                	<?php						
						$ses_sql = mysql_query("SELECT img FROM usuarios WHERE id_login = '$id_session'", $connection);
						$row = mysql_fetch_assoc($ses_sql);
					?>
                    
                    <li><img id="pf" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/perfil/<?php echo $row['img']; ?>"/></a></li>
                    <li class="ligne"><a href="index.php">INÍCIO</a></li>
                    <li class="ligne"><a href="perfil.php">PERFIL</a></li>
                    <li class="ligne"><a href="perfiledit.php">EDITAR PERFIL</a></li>
                    <li class="ligne"><a href="publicar.php">CRIAR PUBLICAÇÃO</a></li>
            		<li class="ligne"><a href="logout.php">SAIR</a></li>
            	</ul>
            </div>
            
            <div id="navegador">
            	<div id="dados">
                	<?php
					
                    	$pagina[1] = "../mysql/pagina1.php";
					  	$pagina[2] = "../mysql/pagina2.php";
						
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
                    
                    <div class="nome">
                    	<span>CRIAR PUBLICAÇÃO</span>
                    </div>
                    
                    <div class="dados_basicos">
                    	<form method="post" action="post_send.php">
                    	<ul>
                        	<li>
                            	<label>Título da publicação: </label>
                            	<input type="texto" name="titulo" id="titulo" style="float: right; font-size: 16px; padding: 2px; width: 340px;"/>
                            </li>
                            <li><input type="hidden" name="autor"  value="<?=$valor_id[0]?>" /></li>
                        </ul>
                    </div>
                    
                    <div class="sobre">                    	
                            <ul>
                                <li>                                
                                    <textarea name="editor1" id="editor1" rows="10" cols="80">
                                        
                                    </textarea>
                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace( 'editor1' );
                                    </script>
                                </li>
                                <li><input type="submit" name="botao" id="botao" value="ENVIAR"/></li>
                            </ul>
                        </form>
                        <?php
							include 'post_send.php';
						?>
                    </div>
                </div>
            </div>	                
        </div>
        
        <footer class="rodapé">
        	<div class="row"> 
            	<span>Assosiação Habitacional Nova Terra - 2015</span>
            	<nav id="cardapio">           	
                    <ul>
                        <li><a href="badges/about.php">Sobre</a></li>
                        <li><a href="badges/developers.php">Desenvolvedores</a></li>
                        <li><a href="badges/addCoordenador.php">Agregar usuários</a></li>
                        <!--<li><a href="#">Termos de uso</a></li>-->
                    </ul>
                </nav>
            </div>
        </footer>
    </body>
</html>