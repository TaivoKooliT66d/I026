<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>I244 - Session 7 - Cats</title>
	<meta name="author" content="Taivo Liik">

	<style type="text/css">
		div{
			border: 1px solid #000000;
			float: left;
			width: 400px;
			height: 400px;
			
		}
		p{
			text-decoration: underline;
		}
		img{
			width: 50%;
			heigh: 50%;
		}
	</style>
<body>
<?php

/*
uua uus php fail ning kirjeldada selles mingi kahemõõtmeline massiiv. Teema omal valikul 
Näiteks
$kassid= array( 
		array('nimi'=>'Miisu', 'vanus'=>2), 
		array('nimi'=>'Tom', 'vanus'=>1)
	);
Aga rohkemate väljadega (nagu karva värvus, omaniku nimi, link pildile etc)
*/
$kassid= array( 
		array('nimi'=>'Miisu', 'vanus'=>2, 'Omanik' => 'TaivoSan', 'pilt'=> 'img/cat1.jpg','pilt_alt'=>'Kass 1'), 
		array('nimi'=>'Kiisu', 'vanus'=>1, 'Omanik' => 'Paul', 'pilt'=> 'img/cat2.jpg','pilt_alt'=>'Kass 2'), 
		array('nimi'=>'Liisu', 'vanus'=>5, 'Omanik' => 'Madis', 'pilt'=> 'img/cat3.jpg','pilt_alt'=>'Kass 3'), 
		array('nimi'=>'Viisu', 'vanus'=>7, 'Omanik' => 'Kevin', 'pilt'=> 'img/cat4.jpg','pilt_alt'=>'Kass 4')
	);
/*

pärast massiivi kirjeldamist läbida massiiv foreach tsükliga nii, et igal iteratsioonil kaasatakse mingit html faili (luuakse järgmises punktis) include funktsiooni abil.
luua eraldi html fail (selle nimega, mis sai enne include fn sisse kirjutatud), kus esitatakse erinevate html elementide (div, p, img, a ...) ja teksti abil infot justkui oleks tegemist ühemõõtmelise massiiviga 

nt. $kass= array('nimi'=>'Miisu', 'vanus'=>2); puhul  <p><?php echo $kass['nimi'];?> on <?php echo $kass['vanus'];?> aastane</p>
Tulemuse kuvamist saab mõjutada CSS-iga. Omal valikul kasutada kas class või style atribuuti.

Veebilehitsejas avada php fail, kus kirjeldasime massiivi. Tulemusena peaks kuvatama sama ülesehitusega aga erineva infoga blokke nagu siin
*/

foreach ($kassid as $kass) {
	include("include2.html");
	
}
?>
</body>
</html>

