<?php
	session_start();
	require_once('head.html'); 
	/*
	Kui kasutaja esitab hääletamise vormi abil infot tuleb pärast valideerimist (see peaks juba tehtud olema) tegeleda kontrolliga
	kui sessioonis pole mingit välja nt 'voted_for', siis tuleb ta tekitada ning määrata väärtuseks valitud pildi võti (see, mis vormiga saadeti)
	kui sessioonis see väli eksisteerib, siis seda üle ei kirjutata, vaid kuvatakse kasutajale vaade teatega, et ta on juba oma valiku ära teinud
	kuna selles sessiooniväljas on (eeldusel) piltide massiivi üks võti, saab vaates kasutajale tema poolt tehtud valikut meelde tuletada
	Kui kasutaja läheb pärast valiku tegemist jälle hääletamise vaatesse, tuleks talle kuvada sama vaade, mida ta tulemusena nägi. Sedasi pole tal võimalik uut valikut teha.
	Testimise eesmärgil tasuks kuskile lehele (nt. hääletamise tulemuse lehele) lisada sessiooni lõpetamise nupp/link.
	pärast sessiooni lõpetamist tasub kasutaja lehele tagasi suunata, kus talle luuakse kohe uus sessioon ja võimaldatakse hääletamine

	*/
	$pics = array(
	  1 => array('src' => 'pictures/gallery/nameless1.jpg', 'label' => 'p1', 'alt' => 'nimetu 1'),
	  2 => array('src' => 'pictures/gallery/nameless2.jpg', 'label' => 'p2', 'alt' => 'nimetu 2'),
	  3 => array('src' => 'pictures/gallery/nameless3.jpg', 'label' => 'p3', 'alt' => 'nimetu 3'),
	  4 => array('src' => 'pictures/gallery/nameless4.jpg', 'label' => 'p4', 'alt' => 'nimetu 4'),
	  5 => array('src' => 'pictures/gallery/nameless5.jpg', 'label' => 'p5', 'alt' => 'nimetu 5'),
	  6 => array('src' => 'pictures/gallery/nameless6.jpg', 'label' => 'p6', 'alt' => 'nimetu 6')
		); 

	if (!empty($_GET["page"])) {
		$page = $_GET["page"];
	}
	else $page = "home";
	
		
	switch ($page) {
		case "home":
			require_once("pealeht.html");
			break;
		case "galerii":
			require_once("galerii.html");
			break;
		case "vote":
			require_once("vote.html");
			break;		
		case "result":
			require_once("tulemus.html");
			break;		
		case "session":
			session_destroy();
			require_once("pealeht.html");
			break;
		default:
			require_once("pealeht.html");
	}
	require_once("foot.html");
?>