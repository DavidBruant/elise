"use strict";

var chapterBtn = document.getElementsByClassName('chapter')[0],
	bodyWidth = document.body.offsetWidth,
	screenStep = document.getElementsByClassName('screen')[0],
	sizeScreen = 'mobile',
	root, 
	state = 'none', 
	svgRoot = null, 
	stateTarget, 
	stateOrigin, 
	stateTf;

//ENSEMBLE DES FONCTIONS

//assigner une var en fonction de la résolution
function getBodyWidth(){
	bodyWidth = document.body.offsetWidth;
	if(bodyWidth<=520){
		sizeScreen = "mobile";
	}else if(bodyWidth<=1024){
		sizeScreen = "tablette";
	}else{
		sizeScreen = "desktop";
	}
	return sizeScreen;
}

//changer l'image en fonction de la résolution et de la page 
//(quand balise img, pour les pages index et rtfm + pour les indices dans les pages step)		
function changeImage(page, id){

	var sizeScreen = getBodyWidth(),
		image = document.getElementById(id),
		srcImage = image.getAttribute("src"),
		pageLength = page.length+1,
		lengthImage = srcImage.length;

	if(id == 'indice-found'){
		newSrcImage = srcImage.slice(0,7+pageLength)+''+sizeScreen+'-indice.svg';
	}else{
		newSrcImage = srcImage.slice(0,7+pageLength)+''+sizeScreen+'.svg';

	}
	image.setAttribute("src", newSrcImage);

}

//changer l'image en fonction de la résolution et de la page 
//(quand svg inline, nécessaire pour la manipulation du dom)		
var loadSVG =0;
function changeSVG(page){

	getBodyWidth();		
	newSrcSVG = 'images/'+page+'-'+sizeScreen+'.html';
	makeRequest(newSrcSVG);
	loadSVG ++;
}

//gestion de l'indice
ctIndice = 0;
function findIndice(){
	indice.addEventListener('click', function(){
		if(screenStep.className.length>12){
			if(screenStep.classList.contains('step-hidden-narration')){
				screenStep.classList.remove('step-hidden-narration');
				document.getElementById('narration').classList.remove('before');

			}else{
				screenStep.classList.remove('step-hidden-help');
				document.getElementById('help').classList.remove('before');
			}
		}
		document.getElementById('bravo').style.display="block";
		if(indice.getAttribute('class') == ''){
    		indice.setAttribute('class','shine');	
    	}
		ctIndice = 1;
		resetZoom(viewport);
		clearHandlers(root);

	});
}

//cache le nom de chapitre et lance tout le bazarre		
function hideChapterBtn(){

	chapterBtn.classList.add('hidden');
	changeSVG(page);
	changeImage(page,id);	
	ctChapter ++;
	indice = document.getElementById('indice');
	screenStep.classList.add('step-hidden-narration');
	document.getElementById('narration').classList.add('before');
	if(getBodyWidth() == 'mobile'){
		document.getElementById('narration-btn').innerHTML = '<span>voir</span>';
	}
	setTimeout(findIndice,1000);
	closeIndice();
}

//laisse apparaitre les panneaux narration et aide		
function togglePanel(panel){
	document.getElementById(panel+'-btn').addEventListener('click',function(){
		if(document.getElementById(panel).classList.contains('before')){
			setupHandlers(root);	
		}else{
			clearHandlers(root);
		}
		this.classList.toggle('step-hidden-'+panel+'-btn');
		screenStep.classList.toggle('step-hidden-'+panel);
		document.getElementById(panel).classList.toggle('before');				
		if(getBodyWidth() == 'mobile'){
			if(document.getElementById(panel).classList.contains('before')){
				document.getElementById(panel+'-btn').innerHTML = '<span>voir</span>';
			}else if(panel == 'narration'){
				document.getElementById(panel+'-btn').innerHTML = '<span>Lire</span>';
			}else{
				document.getElementById(panel+'-btn').innerHTML = '<span>Besoin d\'aide?</span>';
			}
		}	
	})
}

//dans le panneau aide, menu dropdown
function toggleDropdown(){
	var helpPannel = document.getElementById('help');
	[].forEach.call(helpPannel.getElementsByClassName('help-list'), function(el) {
	  el.addEventListener("click", function() {
	    el.parentNode.getElementsByClassName('dropdown')[0].classList.toggle('dropdown-hidden');
	    el.classList.toggle('active');
	    if(el.getAttribute('id') == 'help-indice'){
	    	if(indice.getAttribute('class') == ''){
	    		indice.setAttribute('class','shine');	
	    	}else{
	    		indice.setAttribute('class','');
	    	}	
	    }
	  });
	});

}

//en cas de retour depuis une url, message d'alert responsive jusqu'à ce que ce soit la bonne taille
function responsiveAlert(){
	var alert = document.getElementById('alert');
	if(alert.className.slice(6,alert.className.length) == getBodyWidth()){
		alert.innerHTML='Bien, maintenant tu es au bon endroit. Tu peux cliquer n\'importe où pour continuer.';
	}else{
		alert.innerHTML='Ah, non, ce n\'est pas encore la bonne taille';
	}
}

//en arrivant sur la page la première fois, message d'alert responsive jusqu'à ce que l'utilisateur aggrandise la page
function responsiveAlertHome(){
	var alert = document.getElementById('alert');
	if(alert.className.slice(6,alert.className.length) == getBodyWidth()){
		alert.innerHTML='Bien, pour commencer, clique n’importe où dans la page';
		welcome.addEventListener('click',function(){
			this.style.display="none";
			this.innerHTML = '';
		});
	}else{
		alert.innerHTML='Ah, non, ce n\'est pas encore la bonne taille';
	}
}

//fermer le panneau bravo d'indice et animer la flèche pour agrandir
function closeIndice(){
	document.getElementById('close').addEventListener('click',function(e){
		e.preventDefault();
		document.getElementById('bravo').style.display="none";
		document.getElementById('resize').classList.remove('hidden');
	})
}

//detecte l'inactivité, et affiche une aide en fonction (trois fois max)
function checkInactivity() {
    var timer;
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;

    function help() {
       	if(screenStep.className.length<12){
       		document.getElementById('help-zoom').classList.remove('hidden');
		}
    	[].forEach.call(document.getElementsByClassName('toggle'), function(el) {
		    el.classList.add('hover');
		});
		ctInactivity ++;
    }
    function resetHelp(){
    	document.getElementById('help-zoom').classList.add('hidden');
    	[].forEach.call(document.getElementsByClassName('toggle'), function(el) {
		    el.classList.remove('hover');
		});
    }
    function resetTimer() {
    	resetHelp();
        clearTimeout(timer);
        if(ctIndice ==0){
        	switch(ctInactivity){
        		case 0:
	        		timer = setTimeout(help, 3000);
	        		break;	
	        	case 1:
	        	case 2:
	        		timer = setTimeout(help, 7000);
	        		break;
	        	default:
	        		break;
        	}	
        }
    }
};

//affiche le texte pour support mobile, si l'utilisateur vient d'une étape précédente sans avoir commencé par le début (car du coup, il lui manque certains passages de résolutions plus petites)
function displayMobileTexte(){
	
	[].forEach.call(document.getElementsByClassName('texte'), function(el) {
		if(el.classList.contains('tactile-only') == false){
			el.classList.add('hidden');
		}else{
			el.classList.remove('hidden');
		}
	});

}

//fonction de construction d'URL pour revenir à l'histoire plus tard (+traitement php)
function createUrl(){
	getBodyWidth();
	var currentUrl = window.location.pathname.split( '?' )[0];
	var newUrl = currentUrl+'?oldSizeScreen='+sizeScreen;
	return newUrl;
}

//fonction ajax pour l'envoi de formulaire sans recharger la page
function sendUrl(formId){
    var elem = document.getElementById(formId).elements;
    var params = "";
    url = document.getElementById(formId).action;

    for(var i = 0; i < elem.length; i++){
        params += elem[i].name + "=" + encodeURIComponent(elem[i].value) + "&";
     
		if (window.XMLHttpRequest) { // Mozilla, Safari,...
	        xmlhttp = new XMLHttpRequest();
	        if (xmlhttp.overrideMimeType) {
	            xmlhttp.overrideMimeType('text/xml');
	        }
	    }
	    else if (window.ActiveXObject) { // IE
	        try {
	            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	        }
	        catch (e) {
	            try {
	                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            catch (e) {}
	        }
	    }
	}
	xmlhttp.onreadystatechange = function() { 
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			if(xmlhttp.responseText == 'send'){
				//pour le moment fake callback
				document.getElementById('fake-thanks').innerHTML = 'Voilà, tu peux partir tranquille';
				document.getElementById('email').value = '';
			}
		}else{
			document.getElementById('fake-thanks').innerHTML = 'Remplis le champ mail (avec une adresse valide)';
			document.getElementById('email').value = '';
		}
	};
    xmlhttp.open("POST",url,true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(params);
    return xmlhttp.responseText;    
}

//fonctions ajax nécessaires pour injecter le svg suivant les résolutions
function makeRequest(url) {

    var httpRequest = false;

    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        httpRequest = new XMLHttpRequest();
        if (httpRequest.overrideMimeType) {
            httpRequest.overrideMimeType('text/xml');
        }
    }
    else if (window.ActiveXObject) { // IE
        try {
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {}
        }
    }

    if (!httpRequest) {
        alert('Abandon :( Impossible de créer une instance XMLHTTP');
        return false;
    }
    httpRequest.onreadystatechange = function() { injectContent(httpRequest); };
    httpRequest.open('GET', url, true);
    httpRequest.send(null);

}

function injectContent(httpRequest) {

    if (httpRequest.readyState == 4) {
        if (httpRequest.status == 200) {
            svg.innerHTML = httpRequest.responseText;
            indice = document.getElementById('indice');	
            root = document.getElementById('svgCanvas');
            viewport = root.getElementById('viewport');
            setTimeout(findIndice,1000);
            resetZoom(viewport);
            //setupHandlers(root);	
        } else {
            //alert('Un problème est survenu avec la requête.');
        }
    }

}

//reset zoom svg

function resetZoom(element){
	if(ctIndice>0){
		var reset = "matrix(1,0,0,1,0,0)";
		element.setAttribute("transform", reset);
	}else{
		element.addEventListener('dblclick', function(){
			var reset = "matrix(1,0,0,1,0,0)";
			element.setAttribute("transform", reset);
		})	
	}
}

//EXECUTION DES FONCTIONS

if( document.body.getAttribute('id') == 'home' || document.body.getAttribute('id') == "rtfm" ){

	var page = document.body.getAttribute('id'),
		id = 'illu',
		welcome = document.getElementById('welcome');


	changeImage(page, id);
	
	if(welcome.innerHTML == ''){
		welcome.style.display = "none";
	}else{
		if(getBodyWidth() == 'desktop'){
			welcome.addEventListener('click',function(){
				this.style.display="none";
				this.innerHTML = '';
			});	
		}	
	}

	window.onresize = function(){
		if(welcome.innerHTML != ''){
			responsiveAlertHome();
		}
		return changeImage(page, id);
	};

}
if( document.body.getAttribute('id') == "rtfm" ){
	function displayResize(){
		if(sizeScreen != 'mobile'){
			document.getElementById('resize').classList.remove('hidden');
		}
	}
	setTimeout(displayResize,7000);
	
}
if( document.body.getAttribute('id').slice(0,4) == 'step' || document.readyState == 'complete'){

	var	image = document.getElementById('illu'),
		svg = document.getElementsByClassName('illu')[0],
		page = document.body.getAttribute('id'),
		id = 'indice-found',
		url = document.getElementById('url'),
		welcome = document.getElementById('welcome'),
		ctChapter = 0;

	if(welcome.innerHTML == ''){
		welcome.style.display = "none";
		setTimeout(hideChapterBtn,2000);
	}else{
		welcome.addEventListener('click',function(){
			this.style.display = "none";
			this.innerHTML = '';
			setTimeout(hideChapterBtn,2000);
		});
	}
	if(document.body.className == 'previous'){
		displayMobileTexte();
	}
	chapterBtn.addEventListener('click',hideChapterBtn);
	url.setAttribute('value', createUrl());
	togglePanel('narration');
	togglePanel('help');
	setTimeout(toggleDropdown, 500);

	var ctInactivity = 0;	
	checkInactivity();

	window.onresize = function(){
		if(welcome.innerHTML != ''){
			responsiveAlert();
		}
		if(sizeScreen != getBodyWidth()){
			window.location = window.location.pathname.split( '?' )[0];
			changeImage(page,id);
			if(ctChapter>0){
				return changeSVG(page);
			}
			url.setAttribute('value', createUrl());
			
		}
	};

	document.getElementById('submit-quit').addEventListener('click', function(e){
		e.preventDefault();
		sendUrl('send-url');
	});

}
