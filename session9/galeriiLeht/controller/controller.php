<?php
	require_once('head.html'); 
	
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
		default:
			require_once("pealeht.html");
	}
	require_once("foot.html");
?>