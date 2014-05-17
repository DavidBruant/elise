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
	<title>Plockton | Elise, une histoire responsive</title>
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
<body id="step-1">

	<div id="inner">
		<!-- Message d'alerte -->
		<div id="welcome"><?php echo $welcome;?></div>

		<div class="screen step">
			<!-- SVG -->
		 	<div class="illu"></div>

		 	<!-- Chapitre -->
		 	<div class="chapter">
		 		<h3>- I -<br/>
		 			Village de Plockton</h3>
		 		<span class="load-barre"></span>
		 	</div>

		 	<!-- Panneau indice -->
			<div id="bravo">
				<p>Bravo! Tu as trouvé l'indice!</p>
				<img id="indice-found" src="images/step-1-mobile-indice.svg"/>
				<ul>
					<li><a id="next" href="step-2.php?from=previous">Passer à l'étape suivante</a></li>
					<li class="desktop"><a href="step-2.php?from=end">Passer au début de l'étape suivante</a></li>
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
				<p><span class='lettrine'>Entre donc,</span> toi qui passes les portes humides de ce <strong>petit village d'Ecosse.</strong></p>
				<p>Le chemin principal, avec ses cottages colorés et le petit pont de pierre qui passe le canal, forment un ensemble franchement pas désagréable à regarder.</p>
				<p>J’espère que ça te plait, parce que l’histoire <strong>se déroule une rue plus loin</strong>, celle qui longe la palmeraie, là.</p>
			</div>
			<div class="texte tablette">
				<p><span class='lettrine'>Oh,</span> le décor n'a guère changé,<strong> le temps est passé</strong> en n'imprimant sa marque que subtilement sur Plockton</p>
				<p>Et pourtant, et pourtant...</p>
			</div>
			<div class="texte desktop">
				<p><span class='lettrine'>La modernité</span> arrive quand même, ici et là, <strong>sur les quais</strong> du village portuaire.</p>
				<p>Il s'étend, évolue chaque jour un peu plus.</p>
			</div>

			<!-- Pour les supports mobiles, sans possibilité de resizer: -->
			<div class="texte tactile-only mobile hidden">
				<p><span class='lettrine'>Entre donc,</span> toi qui passes les portes humides de ce <strong>petit village d'Ecosse.</strong></p>
				<p>Le chemin principal, avec ses cottages colorés et le petit pont de pierre qui passe le canal, forment un ensemble franchement pas désagréable à regarder.</p>
				<p>J’espère que ça te plait, parce que l’histoire <strong>se déroule une rue plus loin</strong>, celle qui longe la palmeraie, là.</p>
			</div>
			<div class="texte tactile-only tablette hidden">
				<p><span class='lettrine'>Entre donc,</span> toi qui passes les portes humides de ce <strong>petit village d'Ecosse.</strong></p>
				<p>Le décor n'a guère changé avec le temps, les cottages colorés et les quais du canal forment encore un ensemble franchement pas désagréable à regarder.</p>
				<p>L’histoire <strong>se déroule une rue plus loin</strong>, celle qui longe la palmeraie, là.</p>
			</div>
			<div class="texte tactile-only desktop hidden">
				<p><span class='lettrine'>Entre donc,</span> toi qui passes les portes humides de ce <strong>petit village d'Ecosse.</strong></p>
				<p>Ici et là, la modernité fait son chemin à Plockton, le petit village portuaire évolue chaque jour un peu plus.</p>
				<p>L’histoire <strong>se déroule une rue plus loin</strong>, celle qui longe la palmeraie, là.</p>
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
								<p><span class="indice">&laquo;Une rue plus loin, près des palmiers&raquo;</span></p>
							</div>
							<div class="tablette">
								<p><span class="indice">&laquo;Le temps est passé&raquo;</span></p>
							</div>
							<div class="desktop">
								<p><span class="indice">&laquo;Modernité&raquo;</span></p>
							</div>
						</div>
					</li>
					<li><span class="help-list">Tu veux savoir où tu en es</span>
						<div class="dropdown dropdown-hidden plan five">Il reste 3 étapes après celle-ci</div>
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