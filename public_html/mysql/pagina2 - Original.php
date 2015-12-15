<?php
  	$sql = mysql_query("SELECT * FROM postagens ORDER BY data DESC");

  	while($escrava = mysql_fetch_array($sql) or die(mysql_error()){
    		$id = $escrava['id'];
    		$titulo = $escrava['titulo'];
    		$day = $escrava['data'];
    		$materia = $escrava['materia'];
    		$autor = $escrava['autor'];
    		
    		$linha = mysql_fetch_row(mysql_query('SELECT nome, img FROM usuarios WHERE id_login = '.$autor)) or die(mysql_error());
?>
<div id="tab1">
    <div id="div-body">
        <div class="head">
            <div class="img">
                <img src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/perfil/<?php echo $linha[1]; ?>">
            </div>
            
            <div class="info">
                <ul>
                    <li><span><?php echo $titulo; ?></span></li>
                    <li>Feito por <i><?php echo $linha[0].'</i> em '. date("d/m/Y", strtotime($day)).' às '.date("H:i:s", strtotime($day)); ?></li>
                </ul>
            </div>
        </div>
        
        <div class="body">
            <?php echo nl2br($materia); ?>
        </div>
        
        <div class="footer">
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
                <div class="formulario">
                    <form action="" method="post" name="form_comentario" id="form_comentario">
                        <ul>
                            <li><textarea placeholder="Escreva uma resposta..." name="resenha"></textarea></li>
                            <li><input type="hidden" name="id" value="<?php echo $id_session; ?>" /></li>
                            <li><input type="hidden" name="id_post" value="<?php echo $id; ?>" /></li>
                            <li><input class="botão" type="submit" value="ENVIAR" name="botao" /></li>
                        </ul>
                    </form>
                </div>
                <?php
                    while($ecrire = mysql_fetch_array($rechercher)){
                        $nombre = $ecrire['nome'];
                        $jour = $ecrire['data'];
                        $comentario = $ecrire['comentario'];
                ?>
                <div class="respostas">
                    <strong><?php echo $nombre; ?></strong>
                    <?php echo ' '.date("d/m/Y", strtotime($jour)).' às '.date("H:i:s", strtotime($jour)); ?>
                    <p><?php echo nl2br($comentario); ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>                
<?php } ?>
</div>
<?php include '../mysql/reg_resenha.php' ?>