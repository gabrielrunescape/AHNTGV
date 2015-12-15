<?php	
	include '../../mysql/conn.php';
	include '../session.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
      <title>FÓRUM - ASSOCIAÇÃO HABITACIONAL NOVA TERRA</title>
	  <link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Gabriel Fiipe de Souza Prado">
      <meta name="keywords" content="fórum, publicar, ahnt, gv, governador valadares, associação, habitacional, nova, terra">
	  <meta name="description" content="FÓRUM - ASSOCIAÇÃO HABITACIONAL NOVA TERRA">
      
      <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/jquery-1.11.3.min.js"></script>
      <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/js/bootstrap.min.js"></script>
      <link href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/css/css_responsivo.css">
            
      <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/tinymce/tinymce.min.js"></script>
      <script type="text/javascript">
          tinymce.init({
              selector: "#mytextarea",
              language: "pt_BR",
              height: 460,
              plugins: [
                      "advlist autolink link image lists charmap print preview hr spellchecker responsivefilemanager",
                      "searchreplace wordcount visualblocks visualchars code fullscreen media nonbreaking",
                      "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
              ],
      
              toolbar1: "newdocument print | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect | preview",
              toolbar2: "undo redo | cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | link unlink image media code | responsivefilemanager ",
              toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | fullscreen | ltr rtl | spellchecker | forecolor backcolor",
      
              menubar: false,
              toolbar_items_size: 'small',
              
              image_advtab: true ,
 
             external_filemanager_path:"/../filemanager/",
             filemanager_title:"Responsive Filemanager" ,
             external_plugins: { "filemanager" : "/../filemanager/plugin.min.js"}
          });          
      </script>
      
      <style type="text/css">
		  .cell-forum {
			   background: url(../css/trash-close.png);
		  }
	  
		  .cell-forum:hover {
			  background: url(../css/trash-open.png);
			  cursor: pointer;
		  }
      </style>
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
                          <a href="../">INÍCIO<br></a>
                      </li>
                      <li>
                          <a href="../perfil.php">PERFIL</a>
                      </li>
                      <li class="active">
                          <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/forum/">FÓRUM</a>
                      </li>
                      <li>
                          <a href="../logout.php">SAIR</a>
                      </li>
                  </ul>
              </div><!--FIM COLLAPSER NAVBAR-COLLAPSE - CLASS-->
          </div><!--FIM CONTAINER-->
      </div><!--FIM NAVBAR NAVBAR-DEFAULT NAVBAR-STATIC-TOP - CLASS-->
    
	  <?php                              
        if (!isset($_GET['t'])) {								
              
        } else { 
		  	  $limite = 8; // LIMITE DE 3 RESULTADOS POR PÁGINA
							  
			  $SQL_COUNT = mysql_query("SELECT COUNT('id') FROM respostas_forum WHERE id_topico = ".$_GET['t']);
			  $SQL_RESUL = ceil(mysql_result($SQL_COUNT, 0) / $limite);
			  
			  $pg = (isset($_GET['pgn'])) ? (int) $_GET['pgn'] : 1;
			  $start = ($pg - 1) * $limite; // FIM CONTADOR DE PÁGINAS
		  
        $sql = "SELECT * FROM respostas_forum WHERE id_topico = ".$_GET['t']." LIMIT $start, $limite";
          
			  $querry = mysql_query($sql) or die(mysql_error());
			  $qtda = mysql_num_rows($querry); 
			  
			  $info = mysql_fetch_assoc(mysql_query("SELECT * FROM topicos_forum WHERE idtopico = ".$_GET['t'])); 
	  ?>
      
      <div class="container" style="border: 1px solid #EEEEEE; border-top: 0;">
          <div class="row">
              <?php
				  $infoAutor = mysql_fetch_row(mysql_query("SELECT nome, img FROM usuarios WHERE id_login = ".$info['autor']));
          
			  ?>
              <div class="col-md-2 hidden-sm hidden-xs" style="margin: 20px auto;">
                  <img alt="Imagem do autor" src="../../imagens/perfil/<?= $infoAutor[1] ?>" class="hidden-sm hidden-xs img-responsive">
              </div>
              
              <div class="col-md-10">
                  <h1><?= $info['topico'] ?></h1>
                  <h3><a href=""><?= $infoAutor[0] ?></a></h3>
                  <p><?= date("d/m/Y", strtotime($info['data']))." às ".date("H:i:s", strtotime($info['data'])) ?></p>
                  <p>
					  <?php
						 $numResp = mysql_num_rows(mysql_query("SELECT * FROM respostas_forum WHERE id_topico = ".$_GET['t']));
						 
						 if ($numResp == 1) {
							 echo $numResp.' resposta';	 
						 } else {
							 echo $numResp.' respostas';	 
						 }
					  ?>
                  </p>
                  <!--<p>-->
				  <?php	
                      if ($SQL_RESUL > 1 && $pg <= $SQL_RESUL) {
                          echo '<ul class="pagination">';
                          for ($i = 1; $i <= $SQL_RESUL; $i++) {
                              echo '<li><a href="?t='.$_GET['t'].'&pgn='.$i.'">'.$i.'</a></li>';	
                          }
                          echo'</ul>';	
                      }
                  ?>
                  <!--</p>-->
              </div>
          </div>
      </div>
      
      <?php	  
		  	  while($escrever = mysql_fetch_array($querry)){
				  $id = $escrever['idresposta'];
				  $id_topico = $escrever['id_topico'];
				  $data = $escrever['data'];
				  $autor = $escrever['autor']; 
				  $resposta = $escrever['resposta'];
				  
				  $formatado = date("d/m/Y", strtotime($data));
				  
				  $criador = mysql_fetch_row(mysql_query("SELECT nome, img, sobre FROM usuarios WHERE id_login = ".$autor));
      ?>
      
      <div class="container" style="border-left: 1px solid #EEEEEE; border-right: 1px solid #EEEEEE; border-bottom: 1px solid #EEEEEE">
          <div class="row">
              <div class="col-md-3">
                  <h3><?= $criador[0] ?></h3>
                  <hr>
                  <img alt="Imagem do usuário" src="../../imagens/perfil/<?= $criador[1] ?>" class="hidden-sm hidden-xs img-responsive" />
                  <p></p>
                  <p class="hidden-sm hidden-xs"><?= $criador[2] ?></p>
                  <p></p>
              </div>
              
              <div class="col-md-9">
              	  <div class="form-group" style="height: 20px; margin-top: 15px;">
                      <div id="linha-forum">
                          <div class="cell-forum-x" style="float: left; width: 75%">
                              <h5 style="margin-top: 2px;"><?= $formatado.' às '.date("H:i:s", strtotime($data)) ?></h5></li>
                          </div>
                          
                          <?php
            							    if ($privilegios == 'admin') {
            						  ?>
                          
                          <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/deletar.php?id_drop=<?= $id ?>&tablitsa=respostas_forum&coluna=idresposta" title="Clicando aqui, o comentário sem confirmação alguma será excluído. Pense antes de clicar.">
                              <div class="cell-forum" style="float: right; width: 20px; height: 20px; "></div>
                          </a>  
                          
                          <?php
            							    }
            						  ?>                        
                      </div>                    
                  </div>
                                    
                  <hr>
                  
                  <p><?= $resposta ?></p>
                  <p></p>
              </div><!--FIM COL-MD-9 - CLASS-->              
          </div><!--FIM COL-MD-3 - CLASS-->
      </div><!--FIM CONTAINER - CLASS-->
      
      <?php
			}
	  ?>
      
	  <?php
          if ($pg == $SQL_RESUL ) {
			  			  
			  $voce = mysql_fetch_row(mysql_query("SELECT nome, img, sobre FROM usuarios WHERE id_login = ".$id_session));
      ?>
      
      <div class="container" style="border-left: 1px solid #EEEEEE; border-right: 1px solid #EEEEEE; border-bottom: 1px solid #EEEEEE">
          <div class="row">
              <div class="col-md-3">
                  <h3><?= $voce[0] ?></h3>
                  <hr>
                  <img src="../../imagens/perfil/<?= $voce[1] ?>" class="hidden-sm hidden-xs img-responsive">
                  <p></p>
                  <p class="hidden-sm hidden-xs"><?= $voce[2] ?></p>
                  <p></p>
              </div>
              
              <div class="col-md-9">
                  <h3>Adicionar uma resposta</h3>
                  <hr>
                  <form action="post_send.php" method="post" class="text-right">
                      <div class="form-group">
                          <textarea  name="mytextarea" id="mytextarea"><span style="font-size: 14pt; color: #333333;">Para melhor visualizaçãoo de imagens nos fóruns <span style="text-decoration: underline;">é recomendado resolução ajustada máxima</span> de <span style="color: #008000;"><strong>840px</strong></span> na <span style="text-decoration: underline;">largura da imagem</span>.</span></textarea>
                      </div>
                      <input type="hidden" name="autor"  value="<?= $id_session ?>" />
                      <input type="hidden" name="id_topico"  value="<?= $id_topico ?>" />
                      <input type="submit" name="botao" class="btn btn-info" value="ENVIAR" />
                  </form>
              </div><!--FIM COL-MD-9 - CLASS-->              
          </div><!--FIM COL-MD-3 - CLASS-->
      </div><!--FIM CONTAINER - CLASS-->
      
      <?php
          }
      ?>  
      <div class="container">
          <div class="row">
              <?php	
                  if ($SQL_RESUL > 1 && $pg <= $SQL_RESUL) {
                      echo '<ul class="pagination pagination-lg">';
                      for ($i = 1; $i <= $SQL_RESUL; $i++) {
                          echo '<li><a href="?t='.$_GET['t'].'&pgn='.$i.'">'.$i.'</a></li>';	
                      }
                      echo'</ul>';	
                  }
              ?>
          </div><!--FIM ROW - CLASS-->
      </div><!--FIM CONTAINER - CLASS-->
      
      <?php
		  if (isset($_GET['pgn']) > $SQL_RESUL) {
			  echo '<script language= "JavaScript">
				  location.href="http://'.$_SERVER['HTTP_HOST'].'/404.php/"
			  </script>';
	  ?>
      <!--<div class="section">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-dismissable alert-success">
                        <strong>Essa página não existe!</strong>
                      </div>
                  </div>
              </div>
          </div>
      </div>-->
      <?php
		  }
	  ?>
      
      <?php
		  if ($qtda == 0 && !isset($_GET['action']) && !isset($_GET['pgn'])) {
	  ?>
      <div class="section">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-dismissable alert-success">
                        <strong>Quase lá! </strong>Ainda não existe respostas para o tópico. <a href="?t=<?= $_GET['t'] ?>&action=criar">Clique aqui</a> para adicionar uma resposta.<br />
                        Se foi um engano criar o tópico contrate algum DBA ou administrador do site para fazer a exclusão.
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php
		  }
		  
		  if (isset($_GET['action']) && $qtda == 0) {
			  $id_topico = $_GET['t'];
			  
			  $voce = mysql_fetch_row(mysql_query("SELECT nome, img, sobre FROM usuarios WHERE id_login = ".$id_session));
	  ?>
      
      <div class="container" style="border-left: 1px solid #EEEEEE; border-right: 1px solid #EEEEEE; border-bottom: 1px solid #EEEEEE">
          <div class="row">
              <div class="col-md-3">
                  <h3><?= $voce[0] ?></h3>
                  <hr>
                  <img src="../../imagens/perfil/<?= $voce[1] ?>" class="hidden-sm hidden-xs img-responsive">
                  <p></p>
                  <p class="hidden-sm hidden-xs"><?= $voce[2] ?></p>
                  <p></p>
              </div>
              
              <div class="col-md-9">
                  <h3>Adicionar uma resposta</h3>
                  <hr>
                  <form action="post_send.php" method="post" class="text-right">
                      <div class="form-group">
                          <textarea  name="mytextarea" id="mytextarea"><span style="font-size: 14pt; color: #333333;">Para melhor visualizaçãoo de imagens nos fóruns <span style="text-decoration: underline;">é recomendado resolução ajustada máxima</span> de <span style="color: #008000;"><strong>840px</strong></span> na <span style="text-decoration: underline;">largura da imagem</span>.</span></textarea>
                      </div>
                      <input type="hidden" name="autor"  value="<?= $id_session ?>" />
                      <input type="hidden" name="id_topico"  value="<?= $id_topico ?>" />
                      <input type="submit" name="botao" class="btn btn-info" value="ENVIAR" />
                  </form>
              </div><!--FIM COL-MD-9 - CLASS-->              
          </div><!--FIM COL-MD-3 - CLASS-->
      </div><!--FIM CONTAINER - CLASS-->
      		  
	  <?php	  
		  }
		  }
	  ?>
      
      <footer class="section section-primary">
          <div class="container">
              <div class="row">
                  <div class="col-sm-6">
                      <p class="lead">Associação Habitacional Nova Terra - 2015</p>
                  </div>
                  
                  <div class="col-sm-6">
                      <ul class="lead list-inline text-right">
                          <li><a href="../badges/addCoordenador.php" style="color: #FFF;">Agregar usuário</a></li>
                          <li><a href="../badges/developers.php" style="color: #FFF;">Desenvolvedores</a></li>
                          <li><a href="../badges/about.php" style="color: #FFF;">Sobre</a></li>
                          <li><a href="../badges/terms.php" style="color: #FFF;">Termos de uso</a></li>
                      </ul>
                  </div><!--FIM COL-SM-6 - CLASS-->
              </div><!--FIM ROW - CLASS-->
          </div><!--FIM CONTAINER - CLASS-->
      </footer>
  </body>

</html>