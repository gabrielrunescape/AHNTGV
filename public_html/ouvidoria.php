<?php
	include 'cabecalho.php';
	include 'mysql/conn.php';
?>
            
        	<div id="corpo">            
                <div id="recentes">                  	
                	<h3 class="widget-title">Serviços</h3>
                	<div class="block-item-small">
                        <div class="block-image">
                            <a href='avisos.php' title='Ouvidoria pública'>
                                <img src="imagens/corpo/Anexos.jpg" alt="Ouvidoria pública"  width='50' height='50' />
                            </a>
                        </div>
                        
                        <h2>
                            <a href='avisos.php' title='Ouvidoria pública'>Ouvidoria pública</a>
                        </h2>
                        
                        <span class="block-meta">
                            <a href="avisos.php">
								<?php 
                                    $task = mysql_query("SELECT id FROM comentarios") or die(mysql_error());
                                    $qtda = mysql_num_rows($task); 
                                    
                                    if ($qtda == 1) {
                                        echo '1 comentário';
                                    } else {
                                    	echo $qtda.' comentários';
									}
                                ?>
                             </a>
                        </span>
                    </div>
                    
                    <div class="block-item-small">
                        <div class="block-image">
                            <a href='ouvidoria.php' title='Envie sua mensagem'>
                                <img src="imagens/corpo/Anexos.jpg" alt="Envie sua mensagem"  width='50' height='50' />
                            </a>
                        </div>
                        
                        <h2>
                            <a href='ouvidoria.php' title='Envie sua mensagem'>Envie sua mensagem</a>
                        </h2>
                        
                        <span class="block-meta">
                            <a href="ouvidoria.phpcomments"> Dê-nos sua opinião </a>
                        </span>
                    </div>
                    
                	<h3 class="widget-title">POSTAGENS RECENTES</h3>
                	<?php
						$busqueada = mysql_query("SELECT * FROM postagens ORDER BY data DESC") or die(mysql_error());
						
						while($ecrit = mysql_fetch_array($busqueada)){
							//$id = $ecrit['id'];
							$title = $ecrit['titulo'];
							$date = $ecrit['data'];
					?> 
                                         
                    <div class="block-item-small">
                        <div class="block-image">
                            <a href='#<?php echo $title?>' title='<?php echo $title?>'>
                                <img src="http://www.blogpop.com.br/wp-content/uploads/2011/10/dicas-e-truques-instagram3-50x50.png" alt="Instagram: Dicas, truques, tutoriais, fotos e como usar"  width='50' height='50' />
                            </a>
                        </div>
                        
                        <h2>
                            <a href='#<?php echo $title?>' title='<?php echo $title ?>'><?php echo $title ?></a>
                        </h2>
                        
                        <span class="block-meta">
                            <?php echo date("d/m/Y", strtotime($date)) ?>
                            <a href="#comments"> X Comentários </a>
                        </span>
                    </div>
                    
                    <?php } ?>            	
                </div><!--FIM RECENTES-->
                
                <div id="blog">
                  <div class="postagem" id="<?php echo $titulo?>">
                	<h2>OUVIDORIA</h2> 
                    Envie sua mensagem ou solicite uma informação à administração pública preenchendo corretamente os campos abaixo.
                    <p style="padding: 0px; margin: 10px 0px; color: #D40000; text-decoration: blink; font-weight: bold;">
						Atenção! Confira seus dados antes de enviar sua manifestação. <br />
						Após enviar sua mensagem, ela não poderá ser editada ou complementada.
					</p>
                                      
                    <div id="comentarios">
                      <form action="" method="post" name="form_comentario" id="form_comentario">
                        <div id="abrange_com">
                          <div class="design_com">
                              <ul>
                              <li>
                                    <select name="sexo" class="campo" style="border: 1x solid #FFF;">
                                        <option selected="selected" style="display: none">Selecione um tipo</option>
                                        <option value="1">Denúncia</option>
                                        <option value="2">Elogio</option>
                                        <option value="3">Reclamação</option>
                                        <option value="4">Solicitação</option>
                                        <option value="5">Sugestão</option>
                                    </select>
                                </li>
                                <li><input type="text" name="nome_comentario" placeholder="Digite seu nome" class="campo"/></li>
                                <li><input type="text" name="contato_comentario" placeholder="Digite seu email ou telefone" class="campo"/></li>                      		    	
                              </ul>
                          </div><!--FIM DESIGN_COM-CLASS-->
                          
                          <div id="desing_com">
                            <ul>
                                <li><textarea name="comentario" class="textoarea" placeholder="Digite sua mensagem"></textarea></li>
                                <br />
                                <li><input type="submit" name="botao" value="ENVIAR" class="botao"/></li>
                            </ul>
                          </div><!--FIM DESIGN_COM-->
                        </div><!--FIM ABRANGE_COM  -->                      
                      </form>                           
                    </div><!--FIM COMENTARIOS-->    
                </div><!--FIM POSTAGEM--> 
                </div><!--FIM BLOG-->
            </div><!--FIM CORPO-->
            
            <?php
				include 'rodape.php';
			?>