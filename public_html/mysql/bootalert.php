<?php
	function alertax($titulo, $mensagem) {
		$window = '
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="../restrito/css/css_responsivo.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#myModal").modal("show");
				});
			</script>
			
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">'.$titulo.'</h4>
						</div>
						<div class="modal-body">
							<p>'.$mensagem.'</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">OK</button>
						</div>
					</div>
				</div>
			</div>
		';
		
		return $window;
	}
?>

