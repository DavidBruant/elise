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
	<title>Anémone | Elise, une histoire responsive</title>
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
<body id="step-3" class="<?php echo $classFrom; ?>">

	<div id="inner">
		<!-- Message d'alerte -->
		<div id="welcome"><?php echo $welcome;?></div>


		<div class="screen step">

		 	<!-- SVG -->
		 	<div class="illu"></div>

		 	<!-- Chapitre -->
		 	<div class="chapter">
		 		<h3>- III -<br/>
		 			Anémone</h3>
		 		<span class="load-barre"></span>
		 	</div>

		 	<!-- Panneau indice -->
			<div id="bravo">
				<p>Bravo! Tu as trouvé l'indice!</p>
				<img id="indice-found" src="images/step-3-mobile-indice.svg"/>
				<ul>
					<li><a id="next" href="step-4.php?from=previous">Passer à l'étape suivante</a></li>
					<li class="desktop"><a href="step-4.php?from=end">Passer au début de l'étape suivante</a></li>
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
				<p><span class='lettrine'>Laisse-moi te présenter Anémone</span>, <strong>lampadaire</strong> de son état, fraichement installée dans le quartier en septembre dernier.</p>
				<p><strong>Donald, l'allumeur des lanternes</strong>, sentant son activitié compromise, a mis fin à cette idée saugrenue de passer les lumières du village à l'électricité.</p>
				<p>Anémone est donc le seul et unique <strong>exemplaire électrique</strong> de Plockton.</p>
			</div>
			<div class="texte tablette">
				<p><span class="lettrine">Seule de son espèce</span>, Anémone le vit très mal, je t'assure.</p>
				<p>Quand on est une fille, mais qu'on est <strong>un</strong> lampadaire, c'est tout de suite plus compliqué que lorsqu'on est <strong>une</strong> lanterne, tu comprends?</p>
				<p>Et <strong>ces lanternes</strong>, justement, ne manquent pas de le lui faire sentir.</p>
			</div>
			<div class="texte desktop">
				<p><span class='lettrine'>Mais Anémone a pris sa revanche</span> lorsque, par une nuit de tempête infernale, toutes les lanternes se sont brisées et éteintes, tandis que notre lampadaire, forte de ses composants électriques, brillait au milieu de la nuit et guidait les secours.</p>
				<p>Elle se sent aujourd'hui beaucoup, beaucoup moins seule.</p>
			</div>

			<!-- Pour les supports mobiles, sans possibilité de resizer: -->
			<div class="texte tactile-only mobile hidden">
				<p><span class='lettrine'>Laisse-moi te présenter Anémone</span>, <strong>lampadaire</strong> de son état, fraichement installée dans le quartier en septembre dernier.</p>
				<p><strong>Donald, l'allumeur de lanterne</strong>, sentant son activité compromise, a mis fin à cette idée saugrenue de passer les lumières du village à l'électricité.</p>
				<p>Anémone est donc le seul et unique <strong>exemplaire électrique</strong> de Plockton.</p>
			</div>
			<div class="texte tactile-only tablette hidden">
				<p><span class='lettrine'>Laisse-moi te présenter Anémone</span>, seul et unique <strong>lampadaire électrique</strong> de Plockton.</p>
				<p>Quand on est une fille, mais qu'on est <strong>un</strong> lampadaire, c'est tout de suite plus compliqué que lorsqu'on est <strong>une</strong> lanterne, tu comprends?</p>
				<p>Et <strong>ces lanternes</strong>, justement, ne manquent pas de le lui faire sentir.</p>
			</div>
			<div class="texte tactile-only desktop hidden">
				<p><span class='lettrine'>Laisse-moi te présenter Anémone</span>, seul et unique <strong>lampadaire électrique</strong> de Plockton.</p>
				<p>Longtemps raillée par les lanternes, pestes très féminines, Anémone a pu prendre sa revanche, lorsque, par une nuit de tempête infernale, elles se sont toutes brisées et éteintes, tandis que notre lampadaire, forte de ses composants électriques, brillait au milieu de la nuit et guidait les secours.</p>
				<p>Elle se sent aujourd'hui beaucoup, beaucoup moins seule.</p>
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
								<p><span class="indice">&laquo;Des composants électriques&raquo;</span></p>
							</div>
							<div class="tablette">
								<p><span class="indice">&laquo;Les lanternes, ces pisseuses&raquo;</span></p>
							</div>
							<div class="desktop">
								<p><span class="indice">&laquo;Elles se sont brisées&raquo;</span></p>
							</div>
						</div>
					</li>
					<li><span class="help-list">Tu veux savoir où tu en es</span>
						<div class="dropdown dropdown-hidden plan five">Il reste 1 étape après celle-ci</div>
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