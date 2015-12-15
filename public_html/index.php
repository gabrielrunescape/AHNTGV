

<!--<div id="codastro">	cadastrar usuarios no site

            <a href="paginacadastro.php"><img style="float:right; width: 160px; height: 90px; "src="/imagens/corpo/cadastrar.png" /></a>

            </div>fim do cadastro de usuarios-->

<?php

	$title = "Associação Habitacional Nova Terra - Início";

	include 'cabecalho.php';	

	

	/*function getHome() {

		$url = $_SERVER['REQUEST_URI'];

		

		$url = substr($url, 1);

		$url = ($url != '') ? $url : 'home';

		$url = explode('/', $url);

		

		//print_r ($url);

		

		if (file_exists($url[0].'.php')) {

			require ($url[0].'.php');

		} else if (is_dir($url[0])) {

			if (isset($url[1]) && file_exists($url[0].'/'.$url[1].'.php')) {

				require ($url[0].'/'.$url[1].'.php');

			} else {

				require ('404.php');

			}

		} else {

			require ('404.php');

		}

	}

	

	getHome();

	echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	echo $_SERVER['HTTP_HOST'];*/

?>

            

            

        	<div id="corpo">

            	<!-- configuracao dos arquivos fotograficos-->

                <div id="af"> 

                    <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/galery/">

                        <legend id="fotos">Arquivo Fotografico</legend>

                        <img width="300" height="200" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/fotos.jpg">

                    </a>

                </div>

                

                <!--colocacao dos anexos-->

                <div id="anexos"> 

                    <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/anexos.php">

                        <legend id="anex">Anexos e Documentos</legend>

                        <img width="300" height="200"src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/Anexos.jpg">

                    </a>

                </div>

                

                <!-- Apresentacoo de  videos-->

                

                <div id="video">

                    <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/videos.php">

                        <legend id="vide">Vídeos</legend>

                        <img width="300" height="200" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/videos.jpg">

                    </a>

                </div>

                

                <!--Entrevista da semana-->

                <div id="entrevista"> <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/entrevistas.php">

                    <legend id="entrevi">Entrevistas</legend>

                    <img width="300"height="200"src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/entrevista.jpg"></a>

                </div>

                

                <!--Apresentacao de avisos-->

                <div id="avisos"> <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/avisos.php">

                    <legend id="avis">Fala Associado</legend>

                    <img id="avs"src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/avisos2.gif"></img> </a>

                </div>

                

                <!--Produtos da AHNT-->

                <div id="produtos"> <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/produtos.php">

                    <legend id="produt">Produtos e Serviços</legend>

                    <img id="prod"width="190" height="195"src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/servicos.gif"></img> </a>

                </div>

            </div>

            

            <?php

				include 'rodape.php';

			?>