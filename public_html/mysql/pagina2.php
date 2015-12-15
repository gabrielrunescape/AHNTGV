<?php
	$sql = mysql_query("SELECT * FROM postagens ORDER BY data DESC");
	
	while($write = mysql_fetch_array($sql)){	 
		$id = $write['id'];
		$titulo = $write['titulo'];
		$day = $write['data'];
		$materia = $write['materia'];
		$autor = $write['autor'];
		
		$linha = mysql_fetch_row(mysql_query('SELECT nome, img FROM usuarios WHERE id_login = '.$autor)) or die(mysql_error());
?>
						<div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                	<div class="img">
                                        <img alt="Imagem do autor da publicação" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/perfil/<?=$linha[1] ?>" />
                                    </div>
                                    
                                    <?php
										if ($autor == $id_session || $privilegios == 'admin') {
											echo '<a href="deletar.php?id_drop='.$id.'&tablitsa=postagens&coluna=id" title="Clicando aqui, o comentário sem confirmação alguma será excluído. Pense antes de clicar.">
												<div id="delete"></div>    
											</a>';
										}
										
										if ($autor == $id_session) {											
											echo '<a href="publicar.php?edit_post='.$id.'" title="Clique aqui para editar e alterar sua publicação.">
												<div id="edit"></div>    
											</a>';			
										}
									?>
                                    
                                    <h4 class="modal-title"><?php echo $titulo; ?></h4>
                                    <span class="modal-title">Feito por <i><?php echo $linha[0].'</i> em '. date("d/m/Y", strtotime($day)).' às '.date("H:i:s", strtotime($day)); ?></span>
                                </div>
                                
                                <div class="modal-body">
                                    <?php echo $materia; ?>
                                </div>
                                
                                <div class="modal-footer">
                                	<?php
										$rechercher = mysql_query("SELECT * FROM resenhas WHERE id_post = $id") or die(mysql_error());
										$tem_coment = mysql_num_rows($rechercher);
									?>
                                    
                                    <span class="abre_respostas">
                                    	<?php 
											if ($tem_coment == 1) {
												echo $tem_coment.' resposta';
											} else {
												echo $tem_coment.' respostas';
											}
										?>  
                                    </span>
                                    
                                    <div id="respostas">
                                    	<?php
											while($ecrire = mysql_fetch_array($rechercher)){
												$resenhaID = $ecrire['id'];
												$nombre = $ecrire['nome'];
												$jour = $ecrire['data'];
												$comentario = $ecrire['comentario'];
										?>
                                        
                                        <div class="respostas">
                                        	<?php
												$fk_coment = mysql_fetch_row(mysql_query('SELECT nome, sobrenome, img, id FROM usuarios WHERE id = '.$nombre)) or die(mysql_error());
												$user = mysql_fetch_row(mysql_query('SELECT username FROM login WHERE id = '.$fk_coment[3]));
											?>
                                            <div id="foto">
                                                <a href="perfil.php?user=<?=$user[0]?>"><img alt="Imagem do coordenador comentador" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/perfil/<?=$fk_coment[2] ?>" /></a>
                                            </div>
                                            
                                            <div id="texto" class="nav">
                                            	<?php
													if ($nombre == $id_session || $privilegios == 'admin') {
													  echo '<a href="deletar.php?id_drop='.$resenhaID.'&tablitsa=resenhas&coluna=id&url=painel.php#tab=actio-2" title="Clicando aqui, o sem confirmação alguma será excluído. Pense antes de clicar.">
														  <div id="delete"></div>    
													  </a>';
													}
												?>
                                                
                                                <strong><a href="perfil.php?user=<?=$user[0]?>"><?php echo $fk_coment[0].' '.$fk_coment[1]; ?></a></strong> <?php echo ' '.date("d/m/Y", strtotime($jour)).' às '.date("H:i:s", strtotime($jour)); ?> <br />
                                                <p>
                                                    <?php echo nl2br($comentario); ?>
                                                </p>
                                            </div><!--FIM TEXTO - ID-->
                                        </div><!--FIM RESPOSTAS - CLASS-->
                                        <?php } ?> 
                                        
                                        <div class="formulario nav">
                                            <form action="" method="post" name="form_comentario" id="form_comentario">
                                                <textarea rows="3" cols="100" placeholder="Escreva uma resposta..." name="resenha" class="nav-justified"></textarea>
                                                <input type="hidden" name="id_nome" value="<?php echo $id_session; ?>" />
                                                <input type="hidden" name="id_post" value="<?php echo $id; ?>" />
                                                <input class="botão" type="submit" value="ENVIAR" name="botao-resenha" />
                                            </form>
                                        </div><!--FIM FORMULARIO NAV - CLASS-->
                                    </div><!--FIM RESPOSTAS - ID-->
                                </div><!--FIM MODAL-FOOTER - CLASS-->
                            </div><!--FIM MODAL-CONTENT - CLASS-->
                        </div><!--FIM MODAL-DIALOG - CLASS-->
					<?php } ?>
				<?php include 'reg_resenha.php'; ?>