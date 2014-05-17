<?php 
	require_once('php/include.php');
	include 'php/Mobile_Detect.php';
	$detect = new Mobile_Detect();
?>
<!DOCTYPE html>   
<!--[if lte IE 9]><script type="text/javascript" src="js/ie.js"></script><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="fr" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Robert | Elise, une histoire responsive</title>
	<meta name="description" content="Une narration responsive &amp; interactive, par Cécile Habran. TFE ESIAJ 2013">
	<meta name="keywords" content="histoire interative responsive reactive tfe cécile habran elise" />
	<meta name="author" content="Cécile Habran">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">	
	
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114-precomposed.png">
	<link rel="icon" type="image/png" href="favicon.png" />

	<link rel="stylesheet" type="text/css" href="css/app.css">
	<?php
	if ($detect->isMobile() || $detect->isTablet()) {?>
	    <script type="text/javascript" src="js/SVGPan-tactile-ck.js"></script>
	<?php }else{ ?>
	    <script type="text/javascript" src="js/SVGPan-ck.js"></script>
   	    <script type="text/javascript" src="js/modernizr.js"></script>
	<?php }
	?>

</head>
<body id="step-2" class="<?php echo $classFrom; ?>">

	<div id="inner">

		<!-- Message d'alerte -->
		<div id="welcome"><?php echo $welcome;?></div>

		<div class="screen step">
		 	<!-- SVG -->
		 	<div class="illu"></div>

		 	<!-- Chapitre -->
		 	<div class="chapter">
		 		<h3>- II -<br/>
		 			Robert</h3>
		 		<span class="load-barre"></span>
		 	</div>

		 	<!-- Panneau indice -->
			<div id="bravo">
				<p>Bravo! Tu as trouvé l'indice!</p>
				<img id="indice-found" src="images/step-2-mobile-indice.svg"/>
				<ul>
					<li><a id="next" href="step-3.php?from=previous">Passer à l'étape suivante</a></li>
					<li class="desktop"><a href="step-3.php?from=end">Passer au début de l'étape suivante</a></li>
					<li><a href="" id="close" class="">Continuer cette étape à travers les tailles de l'écran</a></li>
				</ul>

			</div>

			<!-- Titres panneaux -->
			<span id="narration-btn" class="toggle"><span>Lire</span></span>
			<span id="help-btn" class="toggle"><span>Besoin d'aide?</span></span>
		</div>

		<div id="narration">
			<!-- Pour le format desktop -->
		 	<div class="texte mobile">
				<p><span class='lettrine'>Dans cette rue</span>, la maison verte accueille un nouveau pensionnaire: <strong>Robert</strong>.</p>
				<p>Robert est un <strong>jeune taille-crayon</strong>, ceux avec une manivelle, ultra-performant, très classe, made in Scotland. </p>
				<p>Sa place sur le bureau est déjà dégagée, il n'a plus qu'à faire connaissance avec ses nouveaux colocataires.</p>
			</div>
			<div class="texte tablette">
				<p><span class="lettrine">Entre un taille-mine</span> fushia et un deuxième taille-crayon à manivelle, <strong>usé et à l’air réprobateur</strong>, Robert est mal tombé.</p>
				<p>Miss Fenella et Sir Darren vivent assez mal son<strong> manque de tenue</strong>.</p>
			</div>
			<div class="texte desktop">
				<p><span class='lettrine'>Mais Robert a fait son temps</span>. Plus franchement hermétique, il est temps pour lui de laisser sa <strong>place à la relève</strong>.</p>
				<p>Les taille-crayons à manivelle, c'est terminé. Maintenant, c'est l'<strong>électricité!</strong></p>
			</div>

			<!-- Pour les supports mobiles, sans possibilité de resizer: -->
			<div class="texte tactile-only mobile hidden">
				<p><span class='lettrine'>Dans cette rue</span>, la maison verte accueille un nouveau pensionnaire: <strong>Robert</strong>.</p>
				<p>Robert est un <strong>jeune taille-crayon</strong>, ceux avec une manivelle, ultra-performant, très classe, made in Scotland. </p>
				<p>Sa place sur le bureau est déjà dégagée, il n'a plus qu'à faire connaissance avec ses <strong>nouveaux colocataires</strong>.</p>
			</div>
			<div class="texte tactile-only tablette hidden">
				<p><span class='lettrine'>Dans cette rue</span>, la maison verte abrite un pensionnaire: <strong>Robert</strong>.</p>
				<p>Robert est un <strong>jeune taille-crayon à manivelle</strong>, et il est un peu maladroit.</p>
				<p>Alors entre Miss Fenella et Sir Darren, il croule sous les <strong>regards désaprobateurs</strong> d'une génération écossaise qui n'a jamais failli à sa tâche.</p>
			</div>
			<div class="texte tactile-only desktop hidden">
				<p><span class='lettrine'>Dans cette rue</span>, la maison verte abritait un vieux pensionnaire: <strong>Robert</strong>.</p>
				<p>Robert est aujourd'hui <strong>un vieux taille-crayon à manivelle</strong>, usé par la tâche.</p>
				<p>Il est temps pour lui de laisser place à la relève. Les manivelles, c'est terminé, maintenant, c'est l'électricité!</p>
			</div>
		</div><!-- end narration -->

		<div id="help">
			<div>
				<h2>De quoi as-tu besoin?</h2>
				<ul>
					<li><span class="help-list">Tu dois quitter l'histoire</span>
						<div id="quit" class="dropdown dropdown-hidden">Obtenir un lien pour revenir plus tard.
							<form id="send-url" action="php/sendurl.php" method="POST">
								<label for="email">Ton adresse:</label>
								<input type="email" name="email" id="email"/>
								<input type="text" value="" name="url" id="url" class="hidden"/>
								<?php echo $champsMail; ?>
								<input type="submit" name="submit-quit" id="submit-quit" value="Envoyer"/>
								<?php echo $merci; ?>
								<span id="fake-thanks"></span>
							</form>
						</div>
					</li> 
					<li><span id="help-indice" class="help-list">Tu ne trouves pas l'indice</span>
						<div class="dropdown dropdown-hidden">
							<div class="mobile">
								<p><span class="indice">&laquo;Nouveaux colocataires&raquo;</span></p>
							</div>
							<div class="tablette">
								<p><span class="indice">&laquo;Sir Darren&raquo;</span></p>
							</div>
							<div class="desktop">
								<p><span class="indice">&laquo;Place à la relève&raquo;</span></p>
							</div>
						</div>
					</li>
					<li><span class="help-list">Tu veux savoir où tu en es</span>
						<div class="dropdown dropdown-hidden plan five">Il reste 2 étapes après celle-ci</div>
					</li>
				</ul>
			</div>
		</div> <!-- end help -->
	
	</div><!-- end inner -->
	
	<!-- Aides en temps réel -->
	<span id="resize" class="hidden"></span>
	<span id="help-zoom" class="hidden"></span>
	<span id="help-toggle-left" class="hidden"></span>
	<span id="help-toggle-right" class="hidden"></span>

	<?php
	if ($detect->isMobile() || $detect->isTablet()) {?>
		<script type="text/javascript" src="js/hammer.min.js"></script>
	    <script type="text/javascript" src="js/app-tactile-ck.js"></script>
	<?php }else{ ?>
	    <script type="text/javascript" src="js/app-ck.js"></script>
	<?php }
	?>

</body>
</html>