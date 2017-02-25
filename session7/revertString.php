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
echo "Original String: ".$str;
echo "<br>";
echo "Reverted String: ".revert($str);
?>