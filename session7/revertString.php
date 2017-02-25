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
echo "Original String: ".$str;
echo "<br>";
echo "Reverted String: ".revert($str);
?>