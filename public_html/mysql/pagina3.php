<?php	
    include 'conn.php';

	$sql = mysql_query("SELECT * FROM comentarios WHERE aceito != 'sim' ORDER BY data DESC ");
	$aprovados = mysql_num_rows($sql);
	
	if ($aprovados == 0) {
?>
	
    <div class="modal-dialog">
    	<div class="modal-content">
            <div class="modal-header">
            	<h4 class="modal-title">Aviso!</h4>
            </div>
            
            <div class="modal-body">
                <p>Não existem comentários a serem aprovados!</p>
            </div>
            
            <div class="modal-footer">
            	<a class="btn btn-warning" style="float:right;" onClick="history.go(0)">
                    Permitir
                </a>
            </div>
        </div>
    </div>
    
<?php
	} else {
		while($escrava = mysql_fetch_array($sql)){
			$id = $escrava['id'];
			$nome = $escrava['nome'];
			$day = $escrava['data'];
			$comentario = $escrava['comentario'];
?>
						<div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><?php echo $nome; ?></h4>
                                    <span class="modal-title"><?php echo date("d/m/Y", strtotime($day)).' às '.date("H:i:s", strtotime($day)); ?></span>
                                </div>
                                
                                <div class="modal-body">
                                    <p><?php echo nl2br($comentario); ?></p>
                                </div>
                                
                                <div class="modal-footer">
            						<a href="permitir.php?id_update=<?=$id?>&update=sim" class="btn btn-primary" style="float:right;">
                                    	Permitir
                                    </a>
                                	<a href="deletar.php?id_drop=<?=$id?>&tablitsa=comentarios&coluna=id" title="Clicando aqui, o comentário sem confirmação alguma será excluído. Pense antes de clicar." class="btn btn-danger" data-dismiss="modal" style="float:right; margin-right: 10px;">
                                    	Apagar
                                    </a>
                                </div><!--FIM MODAL-FOOTER - CLASS-->
                            </div><!--FIM MODAL-CONTENT - CLASS-->
                        </div><!--FIM MODAL-DIALOG - CLASS-->
					<?php } ?>
                <?php } ?>
			<?php include '../mysql/reg_resposta.php' ?>