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
Stringi v�ib kujutada ette kui massiivi t�htedest => N�iteks saab tekstist esimese t�he k�tte $string[0]
Stringist saab lugeda v�lja alamstringe
Funktsiooni sees saab teda ennast v�lja kutsuda (rekursioon). Seda tehes tuleb olla ettevaatlik, et ei tekiks l�pmatut ts�klit
Sellel �lesandel on mitu lahendust. Teha nii mitu funktsiooni/lahendust kui ideid on :) */

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