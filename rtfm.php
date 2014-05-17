<?php 
	include 'php/Mobile_Detect.php';
	$detect = new Mobile_Detect();
?>
<!DOCTYPE html>   
<!--[if lte IE 9]><script type="text/javascript" src="js/ie.js"></script><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="fr" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<!--[if IE]><![endif]-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>RTFM | Elise, une histoire responsive</title>
	<meta name="description" content="Une narration responsive &amp; interactive, par Cécile Habran. TFE ESIAJ 2013">
	<meta name="keywords" content="histoire interative responsive reactive tfe cécile habran elise" />
	<meta name="author" content="Cécile Habran">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">	
	<link rel="icon" type="image/png" href="favicon.png" />
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<?php
		if (!$detect->isMobile() || !$detect->isTablet()) {?>
	   	    <script type="text/javascript" src="js/modernizr.js"></script>
	<?php }
	?>
</head>
<body id="rtfm">
<div class="screen">

	<!-- Message d'alerte -->
	<div id="welcome"><?php echo $welcome;?></div>

 	<div class="illu"><img id="illu" src="images/rtfm-mobile.svg"></div>

 	<!-- Pour le format desktop -->
 	<div class="texte mobile">
 		<p>Voilà, tu es arrivé <strong>au premier temps de l'histoire</strong>. </p>
		<p>Elise a 8 ans, et je te propose d'entrer <strong>dans son univers</strong>.</p>
		<p>À chaque étape, imprègne-toi du récit, <strong>trouve la clé</strong> qui te permettra de passer à la suite et agrandis ta fenêtre.</p>
		<a href="step-1.php" class="next">Commencer</a>
	</div>
	<div class="texte tablette">
		<p>Tu vois? L'image a changé, et Élise, l'héroine de cette histoire, <strong>est plus jeune</strong>.</p><p>Le temps s'adapte à ton écran.</p>
		<p>Continue de <strong>glisser encore</strong>, tu vas voir.</p>
	</div>
	<div class="texte desktop">
		<p>Bienvenue visiteur, dans cette <strong>histoire interactive et responsive</strong>.</p>
		<p><strong>Pourquoi responsive?</strong> Parce qu'elle va s'<strong>adapter</strong> à la taille de ton écran.</p>
		<p><strong>Faisons un essai ensemble</strong>: commence par laisser ta souris dans le coin inférieur droit de ta fenêtre. Lorsqu'elle se transforme en <strong>double-flèche</strong>, clique et glisse vers la gauche.</p>
	</div>

	<!-- Pour les supports mobiles, sans possibilité de resizer: -->
	<div class="texte tactile-only mobile hidden">
		<p>Bienvenue visiteur, dans cette <strong>histoire interactive et responsive</strong>.</p>
 		<p>Sur ton support, tu commences <strong>au premier temps de l'histoire</strong>, lorsqu'Élise a 8 ans, et je te propose d'entrer <strong>dans son univers</strong>.</p>
		<p>À chaque étape, imprègne-toi du récit et <strong>trouve la clé</strong> qui te permettra de passer à la suite.</p>
		<a href="step-1.php" class="next">Commencer</a>
	</div>
	<div class="texte tactile-only tablette hidden">
		<p>Bienvenue visiteur, dans cette <strong>histoire interactive et responsive</strong>.</p>
 		<p>Sur ton support, tu commences <strong>à la moitié de l'histoire</strong>, lorsqu'Élise a 15 ans, et je te propose d'entrer <strong>dans son univers</strong>.</p>
		<p>À chaque étape, imprègne toi du récit et <strong>trouve la clé</strong> qui te permettra de passer à la suite.</p>
		<a href="step-1.php" class="next">Commencer</a>

	</div>
	<div class="texte tactile-only desktop hidden">
		<p>Bienvenue visiteur, dans cette <strong>histoire interactive et responsive</strong>.</p>
 		<p>Sur ton support, tu commences <strong>à la moitié de l'histoire</strong>, lorsqu'Élise a 25 ans, et je te propose d'entrer <strong>dans son univers</strong>.</p>
		<p>À chaque étape, imprègne-toi du récit et <strong>trouve la clé</strong> qui te permettra de passer à la suite.</p>
		<a href="step-1.php" class="next">Commencer</a>

 	</div>

</div><!-- end screen -->

	<!-- Aide en temps réel -->
	<span id="resize" class="hidden"></span>

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