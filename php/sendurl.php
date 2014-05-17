<?php

//envoyer l'url de sauvegarde par mail

//fonction qui vérifie que l'adresse mail en est bien une
function isEmailValid($mail){
	if($mail !== '' && preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $mail)){
		return true;
	}else{
		return false;
	}
}
//traitement des données du formulaire

if ($_POST['submit-quit'] == 'Envoyer'){

	$mail = strip_tags(trim($_POST['email']));
	$url = strip_tags(trim($_POST['url']));	
	
	
		
	//vérification avant d'envoyer
	if(isEmailValid($mail) == false){
		echo "fail";
	}else{
		$sujet = 'Pause';

		$headers  = "From: Elise Une histoire responsive <elise@cecile-habran.be>\r\n";
		$headers .= "Reply-To: elise@cecile-habran.be\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
		$message  = "<html><body style='font-family:Arial,sans-serif;'>";
		$message .= "<div marginwidth='0' marginheight='0' style='text-align:center;min-width:600px;font:14px/20px Helvetica,Arial,sans-serif;margin:0;padding:75px 0; background-color:#3B7B58;'> <center> <table border='0' cellpadding='20' cellspacing='0' height='100%' width='100%' style=''> <tbody><tr> <td align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='600' style='border-radius:6px;background-color:none'> <tbody style='background-color:#fff;'><tr> <td align='center' valign='top'> <h1 style='font-size:28px;margin-bottom:25px;padding:0px;margin-top:0'><div style='text-align:left'><img src='http://cecile-habran.be/tfe/img/mail-header.png' alt='' border='0' style='min-height:140px;width:600px;margin:0;padding:0' width='600' height='140'></div></h1> </td> </tr> <tr> <td align='center' valign='top'> \r\n";
		$message .= "<div><span style='font-size:18px'><strong><span style='font-family:arial,helvetica,sans-serif;'> Re-bonjour visiteur </span></strong></span></div> <p style='padding:10px'>Tu reçois ce mail parce que tu as voulu sauvegarder ton avancée dans l'histoire d'Élise...</p> \r\n";
		$message .=	"<p style='padding:10px 10px 40px'><a href='http://cecile-habran.be".$url."' target='_blank' style='color:#ffffff;display:inline-block;font-family:Helvetica,Arial,sans-serif;width:auto;white-space:nowrap;min-height:32px;margin:5px 5px 0 0;padding:0 22px;text-decoration:none;text-align:center;font-weight:bold;font-style:normal;font-size:15px;line-height:32px;border:0;border-radius:4px;vertical-align:top;background-color:#16A1A8'><span style='display:inline;font-family:Helvetica,Arial,sans-serif;text-decoration:none;font-weight:bold;font-style:normal;font-size:15px;line-height:32px;border:none;background-color:#16A1A8;color:#ffffff'>Revenir là où tu as quitté l'histoire</span></a></p> \r\n";
		$message .="</td> </tr></tbody> </table> </td> </tr></tbody> </table> </center> </div>\r\n";
		$message .= "</body></html>";
		




		$result = mail($mail, $sujet, $message, $headers);
		echo "send";
	}


} 
?>