<?php
	$title = "AHNT - Galeria de fotos";
	include '../cabecalho.php';
?>

<div id="corpo">
	<div id="blog" style="width: 1000px;">
    	<div class="postagem">
            <!--<h3 style="border-bottom: #000 solid 3px; border-spacing: 50px; border-bottom-color: orange;">QUEM SOMOS</h3>-->
            <h2>
            	<a style="margin:0px 50px 0px 0px; border-bottom: orange solid 3px; border-spacing: 50px; ">ARQUIVO FOTOGRÁFICO</a>
            </h2>
            
            <?php 
				/*for ($i = 1; $i <= 135; $i++) {
					echo '<a class="example-image-link" href="../imagens/b'.$i.'.jpg" data-lightbox="example-set"><img class="example-image" src="../imagens/b'.$i.'.jpg"/></a>';
				}*/
				function dirToArray($dir) {
				   $result = array();
  
				   $cdir = scandir($dir);
				   foreach ($cdir as $key => $value) {
					  if (!in_array($value,array(".",".."))) {
						 if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
							$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
						 } else {
							$result[] = $value;
						 }
					  }					  
				   } 
				   
				   return $result;
				}
				
				$array = dirToArray('../imagens/Galeria');
				$vetor = dirToArray('../imagens/fotosAHNT_SL');
				
				for ($i = 0; $i < count($array); $i++) {
					if ($array[$i] != 'Thumbs.db') {
						echo '<a class="example-image-link" href="../imagens/Galeria/'.$array[$i].'" data-lightbox="example-set"><img class="example-image" src="../imagens/Galeria/'.$array[$i].'"/></a>';
					}
				}
				
				for ($j = 0; $j < count($vetor); $j++) {
					if ($vetor[$j] != 'Thumbs.db') {
						echo '<a class="example-image-link" href="../imagens/fotosAHNT_SL/'.$vetor[$j].'" data-lightbox="example-set"><img class="example-image" src="../imagens/fotosAHNT_SL/'.$vetor[$j].'"/></a>';
					}
				}
				
				//print_r(dirToArray('../imagens/Galeria'));
				
				/*$dir = '../imagens/Galeria';
				$files1 = scandir($dir);
				
				print_r($files1);*/
			?>
        </div>
        
        <script src="http://<?=$_SERVER['HTTP_HOST'] ?>/galery/js/lightbox-plus-jquery.min.js"></script>
    </div>  
</div>

<?php
	include '../rodape.php';
?>