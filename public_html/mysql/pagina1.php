<?php	
    $sql = mysql_query("SELECT * FROM comentarios WHERE aceito = 'sim' ORDER BY data DESC ");

	while($escrava = mysql_fetch_array($sql)){
		$id = $escrava['id'];
		$nome = $escrava['nome'];
		$day = $escrava['data'];
		$comentario = $escrava['comentario'];
?>
						<div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <a href="deletar.php?id_drop=<?=$id?>&tablitsa=comentarios&coluna=id" title="Clicando aqui, o comentário sem confirmação alguma será excluído. Pense antes de clicar.">
                                        <div id="delete"></div>    
                                    </a> 
                                    <h4 class="modal-title"><?php echo $nome; ?></h4>
                                    <span class="modal-title"><?php echo date("d/m/Y", strtotime($day)).' às '.date("H:i:s", strtotime($day)); ?></span>
                                </div>
                                
                                <div class="modal-body">
                                    <p><?php echo nl2br($comentario); ?></p>
                                </div>
                                
                                <div class="modal-footer">
                                	<?php
										$rechercher = mysql_query("SELECT * FROM respostas WHERE id_comentario = $id") or die(mysql_error());
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
                                    <!--<a class="btn btn-default" data-dismiss="modal">Close</a>
                                    <a class="btn btn-primary">Save changes</a>-->
                                    <div id="respostas">
                                    	<?php
											while($ecrire = mysql_fetch_array($rechercher)){
												$id_resposta = $ecrire['id'];
												$nombre = $ecrire['nome'];
												$jour = $ecrire['data'];
												$resposta = $ecrire['resposta'];
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
													  echo '<a href="deletar.php?id_drop='.$id_resposta.'&tablitsa=respostas&coluna=id" title="Clicando aqui, o comentário sem confirmação alguma será excluído. Pense antes de clicar.">
														  <div id="delete"></div>    
													  </a>';
													}
												?>
                                                
                                                <strong><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/perfil.php?user=<?=$user[0]?>"><?php echo $fk_coment[0].' '.$fk_coment[1]; ?></a> </strong>  <?php echo ' '.date("d/m/Y", strtotime($jour)).' às '.date("H:i:s", strtotime($jour)); ?> <br />
                                                <p>
                                                    <?php echo nl2br($resposta); ?>
                                                </p>
                                            </div><!--FIM TEXTO - ID-->
                                        </div><!--FIM RESPOSTAS - CLASS-->
                                        <?php } ?> 
                                        
                                        <div class="formulario nav">
                                            <form action="" method="post" name="form_comentario" id="form_comentario">
                                                <textarea rows="3" cols="100" placeholder="Escreva uma resposta..." name="resposta" class="nav-justified"></textarea>
                                                <input type="hidden" name="id" value="<?php echo $id_session; ?>" />
                                                <input type="hidden" name="id_coment" value="<?php echo $id; ?>" />
                                                <input class="botão" type="submit" value="ENVIAR" name="botao" />
                                            </form>
                                        </div><!--FIM FORMULARIO NAV - CLASS-->
                                    </div><!--FIM RESPOSTAS - ID-->
                                </div><!--FIM MODAL-FOOTER - CLASS-->
                            </div><!--FIM MODAL-CONTENT - CLASS-->
                        </div><!--FIM MODAL-DIALOG - CLASS-->
					<?php } ?>
                <?php include '../mysql/reg_resposta.php' ?>