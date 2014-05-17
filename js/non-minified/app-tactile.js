//FOUINE FOUINE FOUINE FOUINE FOUINE FOUINE!

var chapterBtn = document.getElementsByClassName('chapter')[0],
	screen = document.getElementsByClassName('screen')[0],
	bodyWidth = document.body.offsetWidth,
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
	indice.addEventListener('touchend', function(){
		if(screen.className.length>12){
			if(screen.classList.contains('step-hidden-narration')){
				screen.classList.remove('step-hidden-narration');
				document.getElementById('narration').classList.remove('before');

			}else{
				screen.classList.remove('step-hidden-help');
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
	screen.classList.add('step-hidden-narration');
	document.getElementById('narration').classList.add('before');
	if(getBodyWidth() == 'mobile'){
		document.getElementById('narration-btn').innerHTML = '<span>voir</span>';
	}
	setTimeout(findIndice, 1000);
	closeIndice();
	togglePanel();
}

//laisse apparaitre les panneaux narration et aide au swipe
function togglePanel(){
	var hammertime = Hammer(document.body, {
		drag : false,
		swipe_velocity: 0.3
	});
	hammertime.on("swipeleft", function(e){
		//e.gesture.preventDefault();
		e.preventDefault();
		if(screen.classList[2] == 'step-hidden-narration'){ //panel narration ouvert
			document.getElementById('narration').classList.remove('before');
			screen.classList.remove('step-hidden-narration');
			setupHandlers(root);
			if(getBodyWidth() == 'mobile'){
				document.getElementById('narration-btn').innerHTML = '<span>Lire</span>';
			}
		}else if(screen.classList.length<3){//panels fermés
			document.getElementById('help').classList.add('before');
			screen.classList.add('step-hidden-help');
			clearHandlers(root);
			if(getBodyWidth() == 'mobile'){
				document.getElementById('help-btn').innerHTML = '<span>Voir</span>';
			}
		}
	}); 
	hammertime.on("swiperight", function(e){
		e.gesture.preventDefault();
		e.preventDefault();
		if(screen.classList[2] == 'step-hidden-help'){ //panel help ouvert
			document.getElementById('help').classList.remove('before');
			screen.classList.remove('step-hidden-help');
			setupHandlers(root);
			if(getBodyWidth() == 'mobile'){
				document.getElementById('help-btn').innerHTML = '<span>Besoin d\'aide?</span>';
			}
		}else if(screen.classList.length<3){//panels fermés
			document.getElementById('narration').classList.add('before');
			screen.classList.add('step-hidden-narration');
			clearHandlers(root);
			if(getBodyWidth() == 'mobile'){
				document.getElementById('narration-btn').innerHTML = '<span>Voir</span>';
			}
		}
	});

}

//dans le panneau aide, menu dropdown
function toggleDropdown(){
	var helpPannel = document.getElementById('help');
	[].forEach.call(helpPannel.getElementsByClassName('help-list'), function(el) {
	  el.addEventListener("touchend", function() {
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

//fermer le panneau bravo d'indice
function closeIndice(){
	document.getElementById('close').addEventListener('touchend',function(e){
		e.preventDefault();
		document.getElementById('bravo').style.display="none";
	})
}


//detecte l'inactivité, et affiche une aide en fonction
function checkInactivity() {
    var timer;
    var toggleRight = document.getElementById('help-toggle-right');
    var toggleLeft = document.getElementById('help-toggle-left')
    var hammertime = Hammer(document.body);
    window.onload = resetTimer;
    hammertime.on("tap, drag, swipe, touch", resetTimer);

    function help() {
       	if(screen.className.length<12){ //fermé
       		toggleRight.classList.remove('hidden');
       		toggleRight.classList.add('open-right');
       		toggleLeft.classList.remove('hidden');
       		toggleLeft.classList.add('open-left');
		}else if(screen.classList.contains('step-hidden-narration') == true){
			toggleLeft.classList.remove('hidden');
       		toggleLeft.classList.add('close-left');
		}else{
			toggleRight.classList.remove('hidden');
       		toggleRight.classList.add('close-right');
		}
    	[].forEach.call(document.getElementsByClassName('toggle'), function(el) {
		    el.classList.add('hover');
		});
		ctInactivity ++;
    }
    function resetHelp(){
    	toggleLeft.className = '';
    	toggleLeft.classList.add('hidden');
    	toggleRight.className = '';
    	toggleRight.classList.add('hidden');
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

//affiche le texte pour support mobile uniquement (pas possibilité de resizer)
function displayMobileTexte(){
	
	[].forEach.call(document.getElementsByClassName('texte'), function(el) {
		if(el.classList.contains('tactile-only') == false){
			el.classList.add('hidden');
		}else{
			el.classList.remove('hidden');
		}
	});
	if(document.body.getAttribute('id').slice(0,4) == 'step'){
		document.getElementById('close').classList.add('hidden');
		if(document.body.getAttribute('id') == 'step-4'){
			document.getElementsByClassName('end')[0].classList.remove('hidden');
		}
	}

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
    xmlhttp.open("POST",url,false);
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

displayMobileTexte();

if( document.body.getAttribute('id') == 'home' || document.body.getAttribute('id') == "rtfm" ){

	var page = document.body.getAttribute('id'),
		id = 'illu',
		welcome = document.getElementById('welcome');


	changeImage(page, id);
	
	if(welcome.innerHTML == ''){
		welcome.style.display = "none";
	}else{
		welcome.addEventListener('touchend',function(){
			this.style.display = "none";
		});
	}
	
	window.onresize = function(){
		return changeImage(page, id);
	};

}

if( document.body.getAttribute('id').slice(0,4) == 'step'){

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
		welcome.addEventListener('touchend',function(){
			this.style.display = "none";
			setTimeout(hideChapterBtn,2000);
		});
	}

	chapterBtn.addEventListener('touchend',hideChapterBtn);
	url.setAttribute('value', createUrl());
	setTimeout(toggleDropdown, 500);

	var ctInactivity = 0;
	checkInactivity();

	document.getElementById('submit-quit').addEventListener('click', function(e){
		e.preventDefault();
		//parce que ce crétin envoyait au formulaire PHP alors que je voulais faire sur le touchend :)
	});
	document.getElementById('submit-quit').addEventListener('touchend', function(e){
		e.preventDefault();
		sendUrl('send-url');
	});
	
}