<?php 
	include 'php/Mobile_Detect.php';
	$detect = new Mobile_Detect();
	if (!$detect->isMobile() && !$detect->isTablet()){
		require_once('php/include.php');
	}
?>
<!DOCTYPE html>   
<!--[if lte IE 9]><script type="text/javascript" src="js/ie.js"></script><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="fr" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<!--[if IE]><![endif]-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Elise, une histoire responsive</title>
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
		if (!$detect->isMobile() || !$detect->isTablet()) {?>
	   	    <script type="text/javascript" src="js/modernizr.js"></script>
	<?php }
	?>
</head>
<!-- !Body -->
<body id="home">

	<div class="screen">
		<!-- Message d'alerte -->
		<div id="welcome"><?php echo $welcome;?></div>

		<div class="illu"><img id="illu" src="images/home-mobile.svg"></div>

		<a href="rtfm.php" class="btn btn-animate" id="start">Entrer dans l'histoire</a>

	</div>

	<?php
	if ($detect->isMobile() || $detect->isTablet()) {?>
		<script type="text/javascript" src="js/hammer.min.js"></script>
	    <script type="text/javascript" src="js/app-tactile-ck.js"></script>
	<?php }else{;?>
	    <script type="text/javascript" src="js/app-ck.js"></script>
	<?php }
	?>
	
</body>
</html>