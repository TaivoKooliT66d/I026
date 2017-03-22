<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	//$user = "root";
	$pass="t3st3r123";
	//$pass="";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	// siia on vaja fu nktsionaalsust (13. nädalal)

	
	if(isset($_SESSION['user'])&&!isset($id)){ //Kontrollib, kas kasutaja on juba sisse logitud. Kui on, suunab loomade vaatesse (sisselogitud kasutaja ei pea ju uuesti sisse logima)
		$errors[] ='Teil on juba aktiivne sessioon olemas';
	}
	
	else if (isset($_POST["user"]) && isset($_POST["pass"]) && ($_SERVER['REQUEST_METHOD']=="POST")){ //kontrollib, kas kasutaja on üritanud juba vormi saata. Kas päring on tehtud POST (vormi esitamisel) või GET (lingilt tulles) meetodil, saab teada serveri infost, mis asub massiivist $_SERVER võtmega 'REQUEST_METHOD'
		//kui kõik väljad olid täidetud, üritada andmebaasitabelist <sinu kasutajanimi/kood/>_kylalised selekteerida külalist, kelle kasutajanimi ja parool on vastavad
		global $connection;
		$user = mysqli_real_escape_string($connection, htmlspecialchars($_POST["user"]));
		$passw = mysqli_real_escape_string($connection, htmlspecialchars($_POST["pass"]));
		$stmt =$connection ->prepare("SELECT id FROM `<taivol/dk11>_kylastajad` WHERE username =? AND passw = SHA1(?);");
		$stmt->bind_param("ss",$user, $passw);	
		if ($stmt->execute()) {
	    $stmt->bind_result($id);
			 while ($stmt->fetch()) {
				$u_id=$id;
			}
		}
		else $u_id=0;
			
	}
	if(isset($u_id)&&$u_id>0){
		$_SESSION['user'] = $u_id; 
		header("Location: ?pealeht");

	}
	else if (isset($u_id)&&$u_id == 0){ //Kui meetodiks oli POST, kontrollida kas vormiväljad olid täidetud. Vastavalt vajadusele tekitada veateateid (massiiv $errors)
		$errors[] = 'Sellist kasutajanime ja paroolikombinatsiooni ei eksisteeri. Palun proovi uuesti';
	}
	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	// siia on vaja funktsionaalsust
	if(isset($_SESSION['user'])){ //Kontrollib, kas kasutaja on sisse logitud. Kui pole, suunab sisselogimise vaatesse

		global $connection;
		$puurid = array();
		$query ="SELECT DISTINCT(puur) FROM `<taivol/dk11>_loomaaed`";
		$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
		// hangime tulemusest esimese rea

		while($row = $result->fetch_assoc()) {
				$query1 ="SELECT * FROM `<taivol/dk11>_loomaaed` WHERE  puur=".mysqli_real_escape_string($connection, $row['puur']).";";
				$result1 = mysqli_query($connection, $query1) or die("$query - ".mysqli_error($connection));
				
				while($row1 = $result1->fetch_assoc()) {
					$puurid[$row["puur"]][]= $row1;

				}
		}
		
		include_once('views/puurid.html');
	}
	else header("Location: ?page=login");
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	$loom = array();
	if(isset($_SESSION['user'])){ //Kontrollib, kas kasutaja on sisse logitud. Kui pole, suunab sisselogimise vaatesse
		
		if($_SERVER['REQUEST_METHOD']=="POST"){ // kontrollib, kas kasutaja on üritanud juba vormi saata. Kas päring on tehtud POST (vormi esitamisel) või GET (lingilt tulles) meetodil, saab teada serveri infost, mis asub massiivist $_SERVER võtmega 'REQUEST_METHOD'

			if(!empty($_POST["nimi"])){ //kui meetodiks oli POST, tuleb kontrollida, kas kõik vormiväljad olid täidetud ja tekitada vajadusel vastavaid veateateid (massiiv $errors).
				$loom['nimi'] = htmlspecialchars($_POST["nimi"]);
			}
			else $errors[] = "Palun sisetage nimi";

			if(!empty($_POST["puur"])){ //kui meetodiks oli POST, tuleb kontrollida, kas kõik vormiväljad olid täidetud ja tekitada vajadusel vastavaid veateateid (massiiv $errors).
				$loom['puur'] = htmlspecialchars($_POST["puur"]);
			}
			else $errors[] = "Palun sisetage puur";
			
			$pilt = upload("liik"); //Selleks, et kontrollida, kas faili väli täideti, tuleb kontrollida, kas selle välja nimega faili üleslaadminine õnnestus. Selleks on funktsioonide failis juba funktsioon upload($väljanimi), mis tagastab õnnestumisel faili asukoha, luhtumisel tühistringi ""

			
			
			if ($pilt == "") {
				$errors[] = "Palun sisetage pilt";
			}
					
			
			if (empty($errors)) {
				//Kui vigu polnud, siis üritada see loom andmebaasitabelisse <sinu kasutajanimi/kood/>_loomaaed lisada. 
				global $connection;
				//NB! enne info lisamist päringusse, tuleb see kindlasti käia üle mysqli_real_escape_string funktsiooniga (vt. teoorias)

				$nimi = mysqli_real_escape_string($connection, $loom['nimi']);
				$puur = mysqli_real_escape_string($connection, $loom['puur']);
				$stmt =$connection ->prepare("INSERT INTO `<taivol/dk11>_loomaaed` (nimi, liik, puur) VALUES(?,?,?) ;");
				$stmt->bind_param("sss",$nimi,$pilt, $puur);	
				if ($stmt->execute()) { //Kas looma lisamine õnnestus või mitte, saab teada kui kontrollida mis väärtuse tagastab mysqli_insert_id funktsioon. Kui väärtus on nullist suurem, suunata kasutaja loomade vaatessse
				//kasutasin prepared statementi, ohtum ja lollikindlam
					header("Location: ?page=loomad");
				}
				else $errors[] = "Looma lisamine ebaõnnestus, proovige uuesti";
		
			} 
				
		}
				include_once('views/loomavorm.html');

	}
		else header("Location: ?page=login");
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$tmp = explode(".", $_FILES[$name]["name"]); //made s small fix here, original function gave notice. The problem is, that end requires a reference, because it modifies the internal representation of the array (i.e. it makes the current element pointer point to the last element). The result of explode('.', $file_name) cannot be turned into a reference. This is a restriction in the PHP language, that probably exists for simplicity reasons.
	$extension = end($tmp);

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>