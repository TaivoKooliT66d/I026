<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Session 7 - Reverted</title>
	<meta name="author" content="Taivo Liik">

    </style>
</head>
<body>
<?php
/* Kirjutada PHP programm, kus mingis muutujas olev tekst esitatakse peegelpildis.
Mitte kasutada PHP-sse sisse kirjutatud funktsiooni strrev();, vaid luua oma funktsioon
Stringi võib kujutada ette kui massiivi tähtedest => Näiteks saab tekstist esimese tähe kätte $string[0]
Stringist saab lugeda välja alamstringe
Funktsiooni sees saab teda ennast välja kutsuda (rekursioon). Seda tehes tuleb olla ettevaatlik, et ei tekiks lõpmatut tsüklit
Sellel ülesandel on mitu lahendust. Teha nii mitu funktsiooni/lahendust kui ideid on :) */

function revert($str){
	
	$arr1 = str_split($str);
	$revertedString = [];
	for ($a = count($arr1)-1; $a >= 0; $a--){

		$revertedString[count($arr1)-$a] = $arr1[$a];
	}
	return implode("",$revertedString);
}
$str = "Taivo Liik";
echo "<p>Original String: ".$str."</p>";
echo "<br>";
echo "<p>Reverted String: ".revert($str)."</p>";
?>
</body>
</html>