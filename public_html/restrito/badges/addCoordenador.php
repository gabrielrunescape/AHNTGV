<?php
	include '../../mysql/conn.php';
	include('../session.php');
    include '../../mysql/Calc_idade.php';
    include '../mysql/bootalert.php';

    $mensagemLogin = '';
    $mensagemDados = '';
    
    if (isset($_POST['cancelar'])) {
        Header("Location: ../" );
    } 
    
    if (isset($_POST['criar'])) {
        $usuario = $_POST['login'];
        $senha = $_POST['senha'];
        $password = $_POST['password'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $postData = $_POST['datepicker'];
        $sexo = $_POST['sexo'];
        $privilegio = $_POST['privilegio'];
        
        $check_user = mysql_query("SELECT username FROM login WHERE username = '".$usuario."'");
        $check_row = mysql_num_rows($check_user);
        
        if ($usuario != '' && $senha != '' && $password !=  ''&& $nome !=  '' && $sobrenome !=  ''&& $postData !=  '') {
            if (($senha != $password) && ($check_row != 0)) {
                $mensagemLogin = '<p class="text-danger lead"><span style="font-weight: bold;">Login e senhas inválidas. Confira os dados antes de confirmar.</span></p>';
            } else {
                if ($senha != $password) {
                    $mensagemLogin = '<p class="text-danger lead"><span style="font-weight: bold;">Senhas diferentes. Confira as senhas antes de prosseguir.</span></p>';
                } else if ($check_row != 0) {
                    $mensagemLogin = '<p class="text-danger lead"><span style="font-weight: bold;">O login '.$usuario.' já existe. Tente com outro login.</span></p>';
                } else {
                    $idade = (int) calc_idade($postData);
                    
                    if ($idade < 21) {
                        $mensagemDados = '<p class="text-danger lead"><span style="font-weight: bold;">Sua idade não correspondem aos nosso requisitos mínimos.</span></p>';
                    } else {
                        $ano_nasc = date('Y-m-d', strtotime(str_replace('/', '-', $postData)));
                        
                        $create_login = mysql_query("INSERT INTO login VALUES (NULL, '".$usuario."', '".$senha."', '".$privilegio."')");
                        $fetch_row = mysql_fetch_row(mysql_query("SELECT id FROM login WHERE username = '".$usuario."'"));
                        
                        $nome_imagem = ''.date("YmdHms").'_id'.$fetch_row[0].'.jpg';
                        $create_usuario = mysql_query("INSERT INTO usuarios(id, id_login, id_bairro, nome, sobrenome, sexo, dt_nasc, email, telefone, celular, img, sobre) VALUES (NULL, ".$fetch_row[0].", 1, '".$nome."', '".$sobrenome."', '".$sexo."', '".$ano_nasc."', NULL, NULL, NULL, '".$nome_imagem."', NULL)") or die(mysql_error());
                        
                        if (copy('../../imagens/perfil/perfil.jpg', '../../imagens/perfil/'.$nome_imagem)) {
                            echo "<meta http-equiv='refresh' content='0; url=../logout.php'>";
                            echo alertax('Aviso!', 'Usuário criado com sucesso!'); 
                        } else {
                            echo "<meta http-equiv='refresh' content='5; url=../logout.php'>";
                            echo alertax('Aviso!', 'Usuário criado com sucesso! Falha no envio de imagem!');  
                        }
                    }                   
                }
            }
        } else {
            $mensagemLogin = '<p class="text-danger lead"><span style="font-weight: bold;">Existem campos em branco</span></p>';
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="Gabriel Fiipe de Souza Prado">
        <meta name="keywords" content="criar, usuario, coordenador, perfil, ahnt, gv, governador valadares, associação, habitacional, nova, terra">
	  	<meta name="description" content="Perfil - Associação Habitacional Nova Terra" />
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png" />
        <title>ADICIONAR USUÁRIO - ASSOCIAÇÃO HABITACIONAL NOVA TERRA</title>
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/bootstrap.min.js"></script>
        <link href="http://<?=$_SERVER['HTTP_HOST'] ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/css_responsivo.css" />

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/datapicker-pt-BR.js"></script>
        <script>
            $(function() {
                $( "#datepicker" ).datepicker();
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
                        <img alt="Logotipo da AHNT" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/logoAHNT.png" style="margin-top: 5px; padding: 0;" />
                    </a>
                </div>
                
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/painel.php">INÍCIO</a>
                        </li>
                        <li class="active">
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
            <?php
				if ($privilegios != 'admin') {
			?>
            
            <div class="alert alert-danger alert-dismissable" style="margin: 30px auto">
                <strong>Alerta! </strong>Esse usuário não tem privilégios para essa operação.
                
                <p class="text-justify">
                	Caso seu nome de usuário <i><?= $login_session ?></i> seja um administrador e você não consegue acessar essa página contate o administrador ou os desenvolvedores do site.
                </p>
                
                <p class="text-justify">
                	Para realizar essa função o usuário deve ser administrador do site caso seu usuário não seja um administrador faça: <br />
                    <ol style="padding: 0; margin-left: 15px;">
                    	<li>Solicite ao administrador do site;</li>
                    	<li>Solicite aos desenvolvedores do site;</li>
                    	<li>Caso seja feita alguma alteração na associação o administrador notificará aos usuário por e-mail;</li>
                    </ol>
                </p>
                
                <p class="text-right">
                	<a class="btn btn-danger" onClick="history.back()">
                    	Voltar a página anterior
                	</a>
                </p>
            </div>
            
			<?php		
				} else {
			?>
            <div class="well" style="margin: 20px auto">
                <h1 style="padding: 0; margin: 0;" class="text-success">Criar um usuário na rede</h1>
                <hr>
                
                <form class="form-horizontal" method="post" role="form" name="criarUsuario">
                    <div class="form-group form-horizontal">
                        <div class="col-sm-2">
                            <label class="control-label">
                                Login:
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="login" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label">Senha:</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="senha" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label">Confirmar senha: </label>
                        </div>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" />
                        </div>
                    </div>
                    
                    <?php echo $mensagemLogin;?>

                    <hr />

                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label">Nome:</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label">Sobrenome:</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="sobrenome" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label">Sexo:</label>
                        </div>
                        <div class="col-sm-10">
                            <div class="styled-select" >
                                <select name="sexo">
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label text-left">Data de nasc.:</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="datepicker" name="datepicker" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label">Privilégios de usuário:</label>
                        </div>
                        <div class="col-sm-10">
                            <div class="styled-select" >
                                <select name="privilegio">
                                    <option value="admin">Administrador</option>
                                    <option value="comum">Comum</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <?php echo $mensagemDados;?>
                    
                    <hr />

                    <h3 class="text-primary">Termos de uso</h3>

                    <textarea id="sobre" name="termos" readonly cols="60" rows="10" wrap="virtual" dir="ltr" lang="pt"><?php include 'termx.html' ?></textarea>

                    <br />
                    <p><input name="termos" type="radio" onClick="document.criarUsuario.criar.disabled=true" checked="checked"> Não me responsabilizo por esse usuário</p>
                    <p><input name="termos" type="radio" onClick="document.criarUsuario.criar.disabled=false"> Eu me responsabilizo por esse usuário</p>

                    <p class="text-right" style="margin: 0; padding: 0;">
                        <input type="submit" class="btn btn-danger" name="cancelar" value="CANCELAR" />
                        <input type="submit" class="btn btn-primary" name="criar" disabled="disabled" value="CRIAR USUÁRIO" />
                    </p>
                </form>
            </div><!--FIM WELL - CLASS -->
            <?php		
				}
			?>
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