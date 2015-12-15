<?php
	$title = "AHNT - Entrevistas e matérias";
	
	include 'cabecalho.php';
	include 'mysql/conn.php';
	include 'mysql/LimitaCaracteres.php';
?>
            
        	<div id="corpo">            
                <div id="recentes">  
                	<h3 style="color: #171;"class="widget-title">POSTAGENS RECENTES</h3>
                	<?php
						$busqueada = mysql_query("SELECT * FROM postagens ORDER BY data DESC") or die(mysql_error());
						
						while($ecrit = mysql_fetch_array($busqueada)){
							$id_post = $ecrit['id'];
							$title = $ecrit['titulo'];
							$date = $ecrit['data'];
					?> 
                     
                    <div class="block-item-small">
                        <div class="block-image">
                            <a href='?id_post=<?=$id_post ?>' title='<?php echo $title?>'>
                                <img src="http://www.peteletrica.eng.ufba.br/wp-content/uploads/2012/06/Jornal-Corrente-Alternativa1.jpg" alt="<?php echo $title?>"  width='50' height='50' />
                            </a>
                        </div>
                        
                        <h2>
                            <a href='?id_post=<?=$id_post ?>' title='<?php echo $title ?>'><?php echo $title ?></a>
                        </h2>
                        
                        <span class="block-meta">
                            <?php echo date("d/m/Y", strtotime($date)) ?>                            
                        </span>
                    </div>
                    
                    <?php } ?>            	
                </div>
                
                <div id="blog">
                    <?php					
						$limite = 5; // LIMITE DE 3 RESULTADOS POR PÁGINA
						
						$SQL_COUNT = mysql_query("SELECT COUNT('id') FROM postagens");
						$SQL_RESUL = ceil(mysql_result($SQL_COUNT, 0) / $limite);
						
						$pg = (isset($_GET['pg'])) ? (int) $_GET['pg'] : 1;
						$start = ($pg - 1) * $limite; // FIM CONTADOR DE PÁGINAS
							
						if (isset($_GET['id_post'])) {								
							$sql = "SELECT * FROM postagens WHERE id = ".$_GET['id_post'];
						} else { 
							$sql = "SELECT * FROM postagens ORDER BY data DESC LIMIT $start, $limite";
						}
						
                        $querry = mysql_query($sql) or die(mysql_error());
                        $qtda = mysql_num_rows($querry);  
                    
                        while($escrever = mysql_fetch_array($querry)){
                            $id = $escrever['id'];
                            $data = $escrever['data'];
                            $titulo = $escrever['titulo']; 
                            $materia = $escrever['materia'];
                            
                            $formatado = date("d/m/Y", strtotime($data));
                    ?>
                    
                    <div class="postagem" id="<?php echo $titulo?>">
                        <h2>
							<?php 
								if (!isset($_GET['id_post'])) {
									echo '<a href="?id_post='.$id.'">'.$titulo.'</a>';
								} else {
									echo $titulo;
								}
							?>
                        </h2>
						<?php echo 'Postado em '.$formatado.' às '.date("H:m:s", strtotime($data))?>
                        <p class="pagrf">
							<?php 
								if (!isset($_GET['id_post'])) {
									echo limita_caracteres($materia, 1000, true);
							    	echo '<br /><a href="?id_post='.$id.'">Ler mais</a>';
								} else {
									echo $materia;
								}
							?>
                        </p>                        
                    </div><!--FIM POSTAGEM-CLASS-->
                    
                    <?php 
						}
						
						if (!isset($_GET['id_post'])) {
					?>
                    <div class="numerador">
                    <?php	
						if ($SQL_RESUL > 1 && $pg <= $SQL_RESUL) {
							for ($i = 1; $i <= $SQL_RESUL; $i++) {
								echo ' <a href="?pg='.$i.'">'.$i.'</a> ';	
							}	
						}
					?>
                    </div>
                    <?php } ?>
                </div><!--FIM BLOG-->                
            </div><!--FIM CORPO-->
            
            <?php
				include 'rodape.php';
			?>