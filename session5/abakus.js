var target;
/* Nagu eelmiselgi korral, on vaja enne elementide mõjutamist oodata ära lehe laadimine (see window.onload asi)
hankida kõikide bead klassi elementide objektid, salvestada nad muutujasse (tekib massiiv)
Kasutada for tsüklit üle kõigi massiivi elementide itereerimiseks
iga elemendi puhul lugeda tema stiilist tema float stiilireegli väärtus. NB! kuna float tähendab js-is ka komakohaga arvu, siis CSS omaduse jaoks on kasutusel cssFloat omadus.
Kontrollida eelnevas punktis saadud väärtust if lauses. Kui väärtus on left, siis määrata elemendi uueks cssFloat väärtuseks right ja vastupidi.
Kui tahad kontrollida, et just õige element muudab asukohta, siis anna HTML failis bead klassi elementidele mingi sisu nt. jrk. numbrid. (et tulemus oleks ilusam, tasub bead klassile määrata teksti joondamine keskele)*/
window.onload=function(){
	target = document.querySelectorAll("div.bead");
	for(i = 0; i < target.length; i++){
		var direction = window.getComputedStyle(target[i]).float;
		console.log("Direction was: "+direction);
		if(direction == "right"){
			console.log("setting direction to left");
			target[i].style.cssFloat = "left";
			console.log("set");
		}
		if(direction == "left"){
			console.log("setting direction to right");
			target[i].style.cssFloat = "right";
			console.log("set");
		}
		
	}
}
