<?php
	function Pesquisa($tipo, $data) {
		$limite = 7; // LIMITE DE 3 RESULTADOS POR PÁGINA
		
		if ($tipo < 1 && $data == '') {
			$SQL_COUNT = mysql_query("SELECT COUNT('id') FROM comentarios WHERE aceito = 'sim'"); // CONTA O NÚMERO DE RESULTADOS DA PESQUISA
			$SQL_RESUL = ceil(mysql_result($SQL_COUNT, 0) / $limite);
			
			$pg = (isset($_GET['pg'])) ? (int) $_GET['pg'] : 1;
			$start = ($pg - 1) * $limite; // FIM CONTADOR DE PÁGINAS
		
			$reg_coment = mysql_query("SELECT * FROM comentarios WHERE aceito = 'sim' ORDER BY data DESC LIMIT $start, $limite");
		} else if ($tipo > 0 && $data == '') {
			$SQL_COUNT = mysql_query("SELECT COUNT('id') FROM comentarios WHERE tipo = $tipo AND aceito = 'sim'"); // CONTA O NÚMERO DE RESULTADOS DA PESQUISA
			$SQL_RESUL = ceil(mysql_result($SQL_COUNT, 0) / $limite);
			
			$pg = (isset($_GET['pg'])) ? (int) $_GET['pg'] : 1;
			$start = ($pg - 1) * $limite; // FIM CONTADOR DE PÁGINAS
			
			$reg_coment = mysql_query("SELECT * FROM comentarios WHERE  aceito = 'sim' AND tipo = $tipo ORDER BY data DESC LIMIT $start, $limite");
		} else if ($tipo < 1 && $data != '') {
			$SQL_COUNT = mysql_query("SELECT COUNT('id') FROM comentarios WHERE data >= '$data' AND aceito = 'sim'"); // CONTA O NÚMERO DE RESULTADOS DA PESQUISA
			$SQL_RESUL = ceil(mysql_result($SQL_COUNT, 0) / $limite);
			
			$pg = (isset($_GET['pg'])) ? (int) $_GET['pg'] : 1;
			$start = ($pg - 1) * $limite; // FIM CONTADOR DE PÁGINAS
			
			$reg_coment = mysql_query("SELECT * FROM comentarios WHERE data >= '$data' AND aceito = 'sim' ORDER BY data DESC LIMIT $start, $limite");
		} else {
			$SQL_COUNT = mysql_query("SELECT COUNT('id') FROM comentarios WHERE tipo = $tipo AND data >= '$data' AND aceito = 'sim'"); // CONTA O NÚMERO DE RESULTADOS DA PESQUISA
			$SQL_RESUL = ceil(mysql_result($SQL_COUNT, 0) / $limite);
			
			$pg = (isset($_GET['pg'])) ? (int) $_GET['pg'] : 1;
			$start = ($pg - 1) * $limite; // FIM CONTADOR DE PÁGINAS
			
			
			$reg_coment = mysql_query("SELECT * FROM comentarios WHERE tipo = $tipo AND data >= '$data' AND aceito = 'sim' ORDER BY data DESC LIMIT $start, $limite");	
		}
		
		while($uili = mysql_fetch_array($reg_coment)){
			$id = $uili['id'];
			$nome = $uili['nome'];
			$day = $uili['data'];
			$comentario = $uili['comentario'];
			
			
			echo '<div class="comentarios" id="?'.$nome.'">
				<strong>'.$nome.'</strong> '.date("d/m/Y", strtotime($day)).' às '.date("H:i:s", strtotime($day)).'
				<p id>'.$comentario.'</p>
		
				<spam class="abre_respostas"> Respostas </spam>
				
				<div id="respostas">';
			
			$rechercher = mysql_query("SELECT * FROM respostas WHERE id_comentario = $id") or die(mysql_error());
			$tem_coment = mysql_num_rows($rechercher);
			
			if ($tem_coment != 0) {			
				while($ecrire = mysql_fetch_array($rechercher)){
					$nombre = $ecrire['nome'];
					$jour = $ecrire['data'];
					$resposta = $ecrire['resposta'];
					
					$fk_nome = mysql_fetch_row(mysql_query('SELECT nome, sobrenome FROM usuarios WHERE id = '.$nombre));
					
					echo'	<div class="respostas">                        
							<strong>'.$fk_nome[0].' '.$fk_nome[1].'</strong> '.date("d/m/Y", strtotime($jour)).' às '.date("H:i:s", strtotime($jour)).'
							<p>'.$resposta.'</p>   
						</div> <!-- FIM RESPOSTAS-CLASS -->';
				}
			} else {
				echo'	<div class="respostas">                        
						<strong>AVISO</strong>
						<p>O administrador ainda não respondeu essa mensagem.</p>   
					</div> <!-- FIM RESPOSTAS-CLASS -->';
			}
					
			echo'	</div><!--FIM RESPOSTAS-->
			</div><!--FIM COMENTARIOS-CLASS-->';
		}
		
		echo '<div class="numerador">';
			if ($SQL_RESUL > 1 && $pg <= $SQL_RESUL) {
				for ($i = 1; $i <= $SQL_RESUL; $i++) {
					if (isset($_GET['tipo']) || isset($_GET['datepicker'])) { 
						echo ' <a href="?tipo='.$_GET['tipo'].'&datepicker='.$_GET['datepicker'].'&buscar=BUSCAR&pg='.$i.'">'.$i.'</a> ';
					} else {
						echo ' <a href="?pg='.$i.'">'.$i.'</a> ';
					}
				}	
			}
		echo '</div>';
	}
	
	//if (isset($_POST['buscar'])) {
	if (isset($_GET['tipo']) || isset($_GET['datepicker'])) {
		$tipo = $_GET['tipo'];	
		$datadb = $_GET['datepicker'];	
		
		$data = date('Y-m-d', strtotime(str_replace('/', '-', $datadb)));
		
		Pesquisa($tipo, $data);
		
		//echo "<meta http-equiv='refresh' content='0; url=avisos.php'>";
	} else {
		Pesquisa(0, '');
	}
?>