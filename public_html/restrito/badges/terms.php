<?php
	include '../../mysql/conn.php';
	include('../session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="author" content="Gabriel Fiipe de Souza Prado">
        <meta name="keywords" content="sobre, site, perfil, ahnt, gv, governador valadares, associação, habitacional, nova, terra">
	  	<meta name="description" content="Sobre o site - Associação Habitacional Nova Terra">
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/icon.png">
        <title>SOBRE O SITE - ASSOCIAÇÃO HABITACIONAL NOVA TERRA</title>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../css/css_responsivo.css" />
	</head>
    
	<body>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/" target="_blank">
                        <img alt="Logotipo da AHNT" src="http://<?=$_SERVER['HTTP_HOST'] ?>/imagens/corpo/logoAHNT.png" style="margin: 5px 0px; padding: 0;" />
                    </a>
                </div>
                
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/painel.php">INÍCIO</a>
                        </li>
                        <li>
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/perfil.php">PERFIL</a>
                        </li>
                        <li class="active">
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/forum/">FÓRUM</a>
                        </li>
                        <li>
                            <a href="http://<?=$_SERVER['HTTP_HOST'] ?>/restrito/logout.php">SAIR</a>
                        </li>
                    </ul>
                </div><!--FIM COLLAPSER NAVBAR-COLLAPSE - CLASS-->
            </div><!--FIM CONTAINER-->
        </div><!--FIM NAVBAR NAVBAR-DEFAULT NAVBAR-STATIC-TOP - CLASS-->
        
        <div class="container" style="border-left: 1px solid #EEEEEE; border-right: 1px solid #EEEEEE; border-bottom: 1px solid #EEEEEE">
            <!--<div class="row">
                <div class="col-md-8">-->
                    <div class="well" style="margin: 20px auto">
                    	<h1 style="padding: 0; margin: 0;" class="text-success">Termos de uso</h1>
                        <hr />
                        
                        <form class="form-horizontal" role="form">
                            <h4 class="text-primary" style="font-weight: bold;">Considerações dos usuários</h4>
                            <p class="text-justify">
                                Os usuários administradores do site serão responsáveis pelo conteúdo publicado e pela informação passada, sendo eles também, responsáveis por quaisquer alterações do mesmo, certificando-se a não exposição dos associados.
                                <br />1. Os usuários deverão ser maiores de 21 anos
                                <br />2. Os usuários devem ser coordenadores dos núcleos
                                <br />3. Os usuários não devem publicar conteúdo inadequado outros fins além da Associação
                                <br />4. Caso o usuário não seja algum coordenador ou alguém importante durante as reuniões nos núcleos da associação, tome-cuidado antes de dar permissão ao conteúdo interno do site
                                <br />5. Para usuários maus intencionados:
                                <br />a) Sua conta pode ser excluida caso haja denuncia de algum usuário
                                <br />b) Caso haja necessidade para exclusão da conta será notificado ao e-mail registrado que sua conta é uso de má conduta
                                <br />c) Estão exclusos:
                                <br />I - Quem apresente justificativa formal para tal motivo.
                                <br />II - Se em registros constam que o usuário não tenha agido com má conduta.
                                <br />III - Que a conta tenha sido alvo de vandalismo.
                                <br />6. Os administradores do site, por questão de segurança têm acesso ao site e à todas informações presentes no site
                                <br />7. Em caso de conteúdo sigiloso da Associação Habitacional Nova Terra presente ao site, deverá ser notificado aos administradores
                                <br />8. Não será admisível em hipotese alguma, o uso de má linguagem e conteúdo malicioso e/ou falso
                            </p>

                            <hr />

                            <h4 class="text-primary" style="font-weight: bold;">Considerações do fórum</h4>
                            <p class="text-justify">
                                <br />Regras são um conjunto de normas estabelecidas a fim de manter a ordem e o bom funcionamento de uma organização. Este Fórum possui regras pre-estabelecidas, elaboradas criteriosamente com a finalidade de prestar um serviço de informações gratuitas sobre a Associção e temas que o envolvem de forma organizada e fácil acesso aos usuários. Ao confirmar o cadastro, o membro concorda em cumprir à risca todas as regras aqui estipuladas. Portanto, termos como LIBERDADE DE EXPRESSÃO, CENSURA, DITADURA e outros similares não devem ser utilizados para justificar o descumprimento das regras. Dessa forma, quaisquer meios de expressão utilizados neste Fórum que não forem condizentes com o mesmo e/ou que afrontem as regras serão passíveis de intervenções por parte dos Administradores, Coordenadores ou Usuários, que tomarão as medidas cabíveis para restabelecer a ordem, o bom andamento do Fórum e o cumprimento incondicional das Regras.
                                <br />
                                <br />Durante o uso o fórum é vetado:
                                <br />9. O uso e divulgação de informações falsas.
                                <br />a) Seu do fórum não comprindo esse termo pode ser removido pelos administradores do fórum e/ou do site
                                <br />b) Seu uso de forma inadequada não comprindo esse termo pode ter seu uso bloqueado no fórum
                                <br />10. Não usar linguaguem inapropriada para a discursão do tópico
                                <br />11. Evitar criar tópicos para assuntos banais e com pouca discursividade
                                <br />12. Evitar o desreispeito e a desunião da Associação Habitacional Nova Terra Governador Valadares
                                <br />I - Os membros poderão se reunir e discutir sobre tal usuário/coordenador usuário da rede.
                                <br />II - Sua conta poderá ser rastreada para poder chegar a conclusão de quem deverá ser punido.
                                <br />III - Caso seja necessario alguma mudança pela Associação Habitacional Nova Terra que implicará ao fórum e ao site, os mesmo devem avisar aos administradores do site.
                                <br />
                                <br />Procedimento em caso de queixa ou crítica aos administradores:
                                <br />13. Entre em contato com o(a) Administrador(a) do site a fim de estabelecer um diálogo. Procure explicar de forma clara e objetiva o motivo da contestação ou crítica, utilizando para isto o bom senso e a cordialidade, elementos imprescindíveis para a solução do problema.
                                <br />14. Caso não seja encontrada a solução para o problema ao dialogar com o(a) Administrador(a), entre em contato com a Associação Habitacional Nova Terra, que poderá analisar e encontrar uma solução para o caso, sendo desta a última palavra sobre o assunto.
                            </p>

                            <hr />

                            <h4 class="text-primary">OBSERVAÇÕES:</h4>
                            <p class="text-justify">
                                <br />I - O procedimento acima descrito deverá ser realizado via e-mail, tanto no contato com o(a) Administração(a) em questão quanto com a Associação. Mensagens publicadas publicamente em qualquer área do Fórum relacionadas a queixas e críticas à Administração e à Associação serão apagadas e o autor poderá notificado (por e-mail) pela ação imprópria. A insistência em publicar publicamente queixas e críticas após a notificação resultará em punição para o autor das publicações.
                                <br />II - Ao contatar um Administrador, o membro receberá uma mensagem privada (e-mail) do mesmo, confirmando que o caso está sob análise. O Administrador analisará o caso e enviará a segunda mensagem privada ao membro, contendo a conclusão sobre o assunto. A resposta do Administrador será enviada ao membro no prazo máximo de 72 horas após o envio da primeira mensagem privada.
                                <br />III - Palavras de baixo calão e xingamentos na mensagem enviada ao Administrador ou à Associação não serão toleradas; a mensagem será ignorada. A insistência nesse procedimento resultará em punição para o infrator.
                                <br />
                            </p>

                            <hr />

                            <h4 class="text-primary">DICAS:</h4>
                            <p class="text-justify">
                                <br />I - Ao publicar uma pergunta, seja educado e inclua todos os detalhes que possam ser úteis para quem se dispuser a ajudá-lo com o problema, a começar pelo título do tópico, que, se não for relacionado ao problema, irá dificultar uma resposta correta. 
                                <br />II - Sempre pesquise antes de criar um tópico, pois a sua dúvida pode ter sido respondida anteriormente e você ganhará bastante tempo com isso.
                                <br />III - Caso encontre alguma mensagem fora das regras, entre em contato com a administração do site.
                                <br />IV - Mantenha somente um tópico para sanar dúvidas semelhantes, não abra um novo tópico para cada pequena mudança em seu problema/dúvida. Caso seu problema ou dúvida passe por alguma grande mudança, solicite o bloqueio do tópico e abra um novo.
                            </p>
                        </form>
                    </div><!--FIM WELL - CLASS -->
                <!--</div>FIM COL-MD-8 - CLASS-->
            <!--</div>FIM ROW - CLASS-->
        </div><!--FIM CONTAINER - CLASS-->
      
        <footer class="section section-primary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="lead">Associação Habitacional Nova Terra - 2015</p>
                    </div>
                    
                    <div class="col-sm-6">
                        <ul class="lead list-inline text-right">
                            <li><a href="addCoordenador.php" style="color: #FFF;">Agregar usuário</a></li>
                            <li><a href="developers.php" style="color: #FFF;">Desenvolvedores</a></li>
                            <li><a href="about.php" style="color: #FFF;">Sobre</a></li>
                            <li><a href="terms.php" style="color: #FFF;">Termos de uso</a></li>
                        </ul>
                    </div><!--FIM COL-SM-6 - CLASS-->
                </div><!--FIM ROW - CLASS-->
            </div><!--FIM CONTAINER - CLASS-->
        </footer>
	</body>
</html>