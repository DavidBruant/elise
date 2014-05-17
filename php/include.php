<?php 

$ct = 0;
if(isset($_GET['currentSizeScreen'])) {

	$currentSizeScreen = $_GET['currentSizeScreen'];
	//récupérer la page courrante dans l'url (par exemple juste index.php)
	$url = $_SERVER['PHP_SELF']; 
  	$reg = '#^(.+[\\\/])*([^\\\/]+)$#';
  	define('currentPage', preg_replace($reg, '$2', $url));

	//récuper les données de largeur dans l'url et les comparer à ceux reçu par mail + afficher un message en fonction
	if(isset($_GET['oldSizeScreen']) && $ct==0){
		$oldSizeScreen = $_GET['oldSizeScreen'];

		switch ($currentSizeScreen) {
			case $oldSizeScreen:
				$welcome =  "<p>Tu as quitté l'histoire au même moment la dernière fois. Reprenons...</p>";
				$ct = $ct+1;
				break;
			case 'mobile':
				switch ($oldSizeScreen) {
					case 'tablette':
						$welcome = "<p id='alert' class='alert-tablette'>Attention, tu as quitté l'histoire au milieu d'une étape et tu es sur le point d'y revenir au début.</p>";
						break;
					case 'desktop':
						$welcome = "<p id='alert' class='alert-desktop'>Attention, tu as quitté l'histoire à la fin d'une étape et tu es sur le point d'y revenir au début.</p>";
						break;
					default:
						$welcome = '';
						break;
				}
				$ct = $ct+1;
				break;
			case 'tablette':
				switch ($oldSizeScreen) {
					case 'mobile':
						$welcome = "<p id='alert' class='alert-mobile'>Attention, tu as quitté l'histoire au début d'une étape et tu es sur le point d'en afficher la suite.</p>";
						break;
					case 'desktop':
						$welcome = "<p id='alert' class='alert-desktop'>Attention, tu as quitté l'histoire à la fin d'une étape et tu es sur le point d'y revenir au mileu.</p>";
						break;
					default:
						$welcome = '';
						break;
				}
				$ct = $ct+1;
				break;
			case 'desktop':
				switch ($oldSizeScreen) {
					case 'mobile':
						$welcome = "<p id='alert' class='alert-mobile'>Attention, tu as quitté l'histoire au début d'une étape et tu es sur le point d'en afficher la fin.</p>";
						break;
					case 'tablette':
						$welcome = "<p id='alert' class='alert-tablette'>Attention, tu as quitté l'histoire au milieu d'une étape et tu es sur le point d'en afficher la fin.</p>";
						break;
					default:
						$welcome = '';
						break;
				}
				$ct = $ct+1;
				break;
			default:
				$welcome = '';
				$ct = $ct+1;
				break;
		}

	}
	//si c'est la page d'accueil, prévenir l'utilisateur pour qu'il commence avec la page maximisée
	else if((currentPage == 'index.php') && ($currentSizeScreen != 'desktop')){
		$welcome = '<p id="alert" class="alert-desktop">Salut visiteur. Pour une expérience optimale, ça serait bien que tu agrandisses ta fenêtre d\'abord (jusqu\'à ce qu\'elle soit rose).</p>';
	}
}     
else {     
   //current width dans l'url, c'est moche hein!
	echo "<script language='javascript'>
		var bodyWidth = window.outerWidth;
		if(bodyWidth<='520'){
			sizeScreen = 'mobile';
		}else if(bodyWidth<='1024'){
			sizeScreen = 'tablette';
		}else{
			sizeScreen = 'desktop';
		}\n";
	echo "location.href=\"${_SERVER['SCRIPT_NAME']}?${_SERVER['QUERY_STRING']}"
		. "&currentSizeScreen=\" + sizeScreen;\n";
	echo "</script>\n";

	exit();
}   
//déterminer les actions en fonction de la page d'où vient l'utilisateur
if(isset($_GET['from'])){
	//s'il vient d'une étape précédente sans faire de resize (de tablette step-1 à tablette step-2 par exemple)
	$from = $_GET['from'];
	if($from == 'previous'){
		$classFrom = 'previous';
	}
	//s'il vient de la fin d'une étape en desktop et qu'il veut commencer la suivante en mobile
	else{
		$classFrom = 'end';
		$welcome = "<p id='alert' class='alert-mobile'>Pour passer au chapitre suivant en n'en rattant pas une miette, prends le temps de redimensionner ta fenêtre.</p>";
	}
	
}
?>
