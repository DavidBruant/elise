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
	<title>Fin | Elise, une histoire responsive</title>
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
<body id="step-4" class="<?php echo $classFrom; ?>">

	<div id="inner">
		<!-- Message d'alerte -->
		<div id="welcome"><?php echo $welcome;?></div>


		<div class="screen step">

		 	<!-- SVG -->
		 	<div class="illu"></div>

		 	<!-- Chapitre -->
		 	<div class="chapter">
		 		<h3>- IV -<br/>
		 			Élise</h3>
		 		<span class="load-barre"></span>
		 	</div>

		 	<!-- Panneau indice -->
			<div id="bravo">
				<p>Bravo! Tu as trouvé l'indice!</p>
				<img id="indice-found" src="images/step-4-mobile-indice.svg"/>
				<ul>
					<li><a href="" id="close" class="">Continuer cette étape à travers les tailles de l'écran</a></li>
					<p class="end hidden">Pour savoir ce qu'Elise devient, pense à lire l'histoire sur un ordinateur.</p>
					<p class="desktop center">- FIN - </p>
				</ul>

			</div>

			<!-- Titres panneaux -->
			<span id="narration-btn" class="toggle"><span>Lire</span></span>
			<span id="help-btn" class="toggle"><span>Besoin d'aide?</span></span>
		</div>

		<div id="narration">
			<!-- Pour le format desktop -->
		 	<div class="texte mobile">
				<p><span class='lettrine'>Et Élise dans tout ça?</span></p>
				<p>Élise, vois-tu, n'a pas beaucoup d'ami. Mais en fait, si. <strong>Robert et Anémone</strong>, entre autres.</p>
				<p>Ils ne sont pas ordinaires, c'est vrai, et pas franchement causant, mais elle connait leur vie, leurs préoccupations. Elle partage ses secrets et garde les leurs, aspire à <strong>un tas d'aventures</strong> avec eux (même si ce serait compliqué de bouger Anémone).</p>
				<p><strong>Élise est une petite fille pleine d'imagination.</strong></p>
			</div>
			<div class="texte tablette">
				<p><span class="lettrine">Mais ça n'est pas évident,</span> quand on n'a plus huit ans, de n'avoir que <strong>des amis imaginaires</strong>. Ça n'est <strong>pas très bien vu</strong>, malgré le coeur que met Élise à <strong>conter les histoires</strong> des ses deux compères malheureux.</p>
			</div>
			<div class="texte desktop">
				<p><span class='lettrine'>Élise n'a pas laissé tombé</span>.</p>
				<p>Elle a persévéré, travaillant ses talents de conteuses, rencontrant d'autres auteurs.</p>
				<p>Elle n'habite plus Plockton, désormais. Elle a quitté Anémone et Robert, mais c'est certain, <strong>ne les oubliera jamais</strong>.</p>
			</div>

			<!-- Pour les supports mobiles, sans possibilité de resizer: -->
			<div class="texte tactile-only mobile hidden">
				<p><span class='lettrine'>Et Élise dans tout ça?</span></p>
				<p>Élise, vois-tu, n'a pas beaucoup d'ami. Mais en fait, si. <strong>Robert et Anémone</strong>, entre autres.</p>
				<p>Ils ne sont pas ordinaires, c'est vrai, et pas franchement causant, mais elle connait leur vie, leurs préoccupations. Elle partage ses secrets et garde les leurs, aspire à <strong>un tas d'aventures</strong> avec eux (même si ce serait compliqué de bouger Anémone).</p>
				<p><strong>Élise est une petite fille pleine d'imagination.</strong></p>
			</div>
			<div class="texte tactile-only tablette hidden">
				<p><span class='lettrine'>Et Élise dans tout ça?</span></p>
				<p>Élise, vois-tu, n'a pas beaucoup d'ami. Mais en fait, si. <strong>Robert et Anémone</strong>, entre autres.</p>
				<p>Mais ça n'est pas évident, quand on n'a plus huit ans, de n'avoir que <strong>des amis imaginaires</strong>. Ça n'est <strong>pas très bien vu</strong>, malgré le coeur que met Élise à <strong>conter les histoires</strong> des ses deux compères malheureux.</p>
			</div>
			<div class="texte tactile-only desktop hidden">
				<p><span class='lettrine'>Et Élise dans tout ça?</span></p>
				<p>Élise, vois-tu, n'a pas beaucoup d'ami. Mais en fait, si. <strong>Robert et Anémone</strong>, entre autres, mais ça n'est pas très bien vu de n'avoir que <strong>des amis imaginaires</strong>.</p>
				<p>Elle a persévéré, travaillant ses talents de conteuses, rencontrant d'autres auteurs.</p>
				<p>Elle n'habite plus Plockton, désormais. Elle a quitté Anémone et Robert, mais c'est certain, <strong>ne les oubliera jamais</strong>.</p>
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
								<p><span class="indice">&laquo;Pleine d'imagination&raquo;</span></p>
							</div>
							<div class="tablette">
								<p><span class="indice">&laquo;Ses deux compères&raquo;</span></p>
							</div>
							<div class="desktop">
								<p><span class="indice">&laquo;Ne les oubliera jamais&raquo;</span></p>
							</div>
						</div>
					</li>
					<li><span class="help-list">Tu veux en savoir plus</span>
						<div class="dropdown ">
							<p>Ce projet a été réalisé dans le cadre d'un travail de fin d'étude, en Web, Design &amp; Multimedia à l'<a href="http://www.infographie-sup.be">ESIAJ</a>. </p>
							<p>Si son développement t'intéresse, tu trouveras des notes sur l'avancée de ce travail <a href="http://cecile-habran.be/blog">sur mon blog</a>.</p>
							<p>Merci d'avoir parcouru l'histoire jusqu'ici, j'espère qu'elle t'a plu.</p>
							<ul id="share-buttons">
								<li class="twitter share">
	  								<a href="https://twitter.com/share?url=https%3A%2F%2Fcecile-habran.be%2Fpages%2Ftfe&text=%C3%89lise%2C+une+histoire+responsive&via=cecilehabran" target="_blank" title="partager l'histoire sur twitter">Tweet</a>
	  							</li>
	  							<li class="facebook share">
	  								<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://cecile-habran.be/tfe/&p[images][0]=&p[title]=%C3%89lise,%20une%20histoire%20responsive&p[summary]=Une%20narration%20responsive%20%0A&%20interactive,%20par%20C%C3%A9cile%20Habran" target="_blank" title="Partager l'histoire sur facebook">Facebook</a>
	  							</li>
	  						</ul>
						</div>
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