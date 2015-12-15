<?php
	$title = "AHNT - Avisos e comentários";

	include 'cabecalho.php';
	include 'mysql/conn.php';
?>
            
        	<div id="corpo">            
                <div id="recentes">  
                	<h3 style="color: #171;"class="widget-title">POSTAGENS RECENTES</h3>
                	<?php
						$busqueada = mysql_query("SELECT * FROM comentarios WHERE aceito = 'sim' ORDER BY data DESC") or die(mysql_error());
						$contador = 1;
						
						while($ecrit = mysql_fetch_array($busqueada)){
							if ($contador < 10) {
							$fk_repostas = $ecrit['id'];
							$title = $ecrit['nome'];
							$date = $ecrit['data'];
							$type = $ecrit['tipo'];
							$dia = $ecrit['data'];
							
							$contador = $contador + 1;
					?> 
                     
                    <div class="block-item-small">
                        <div class="block-image">
                            <a href='' title='<?php echo $title?>'>
                                <img alt="Imagem gif" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/avisos2.gif"  width='50' height='50' />
                            </a>
                        </div>
                        
                        <h2>
                            <a href='<?php echo '?tipo='.$type.'&datepicker='.date("d/m/Y", strtotime($dia)).'&buscar=BUSCAR'; ?>' title='<?php echo $title ?>'>
								<?php echo $title ?>
                            </a>
                        </h2>
                        
                        <span class="block-meta">
                            <?php echo date("d/m/Y", strtotime($date)).' às '.date("H:i:s", strtotime($date))?>
                            <a href="<?php echo '?tipo='.$type.'&datepicker='.date("d/m/Y", strtotime($dia)).'&buscar=BUSCAR'; ?>">
                            	<?php
									$fk_sql = mysql_query("SELECT id_comentario FROM respostas WHERE id_comentario = ".$fk_repostas);
									$fk_row = mysql_num_rows($fk_sql);
									
									if ($fk_row  == 1) {
										echo $fk_row.' resposta';
									} else {
										echo $fk_row.' respostas';
									}
								?>
                            </a>
                        </span>
                    </div>
                    
                    <?php } }?>            	
                </div>
                
                <div id="blog">
                    <div class="postagem">
                    	<div id="pesquisa">
                            <form action="<?php $_PHP_SELF ?>" method="get">
                            	<ul>
                                	<li>
                                    <h3 style="color: #171;"class="widget-title">VER COMENTÁRIOS</h3>
                                    	<div class="styled-select" style="float: left; margin-right: 20px;">
                                        
                                            <select name="tipo">
                                                <option selected="selected" style="display: none">Selecione um tipo</option>
                                                <option style="color: #171;"value="1">Denúncia</option>
                                                <option style="color: #171;"value="2">Elogio</option>
                                                <option style="color: #171;"value="3">Reclamação</option>
                                                <option style="color: #171;"value="4">Solicitação</option>
                                                <option style="color: #171;"value="5">Sugestão</option>
                                                <option style="color: #171;"value="0">Tudo</option>
                                            </select>
                                        </div>
                                    </li>
                                	<li><input type="text" name="datepicker" id="datepicker" placeholder="Clique para escolher uma data"  class="campo" /></li>
                                	<li><input type="submit" name="buscar" value="BUSCAR" style="color: #0F0;"class="botao" /></li>
                                </ul>
                            </form>
                            <?php include 'mysql/pesquisa.php' ?>
                        </div>
                        
                        
                        
                        <div id="comentarios">
                         <h3 style="color: #171;"class="widget-title">NOVO COMENTÁRIO</h3>
                          <form action="" method="post" name="form_comentario" id="form_comentario">
                            <div id="abrange_com">
                              <div class="design_com">
                                  <div class="styled-select">
                                 
                                      <select name="tipo_mensagem">
                                          <option selected="selected" style="display: none;">Selecione um tipo</option>
                                          <option style="color: #171;"value="1">Denúncia</option>
                                          <option style="color: #171;"value="2">Elogio</option>
                                          <option style="color: #171;"value="3">Reclamação</option>
                                          <option style="color: #171;"value="4">Solicitação</option>
                                          <option style="color: #171;"value="5">Sugestão</option>
                                      </select>
                                  </div>
                                  
                                  <input type="text" name="nome" placeholder="Digite seu nome" class="campo" style="margin: 30px 0px;" />
                                  <input type="text" name="contato" placeholder="Digite seu email ou telefone" class="campo"/>
                             </div>
                                 
                             <div id="desing_com">
                                <textarea name="mensagem" class="textoarea" placeholder="Digite sua mensagem"></textarea>
                                    <br />
                                <input type="submit" name="botao" value="ENVIAR" style="color: #0F0;"class="botao"/>
                              </div>
                            </div>                            
                          </form>
                          <?php include 'mysql/reg_coment.php' ?>
                           
                                              </div><!--FIM COMENTARIOS-->
                    </div><!--FIM POSTAGEM-CLASS-->
                </div><!--FIM BLOG-->                
            </div><!--FIM CORPO-->
            
            <?php
				include 'rodape.php';
			?>