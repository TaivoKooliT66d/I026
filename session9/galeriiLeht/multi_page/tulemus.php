<?php 
	require_once('head.php'); 
	require_once('pic_array.php'); 
?>

<?php 
	$error = array();
	
	if (empty($_GET["pilt"])) {
		$error = array('result'=>'Valik tegemata: Palun vali pilt'); 
				var_dump(($error));

	}

	else if(!is_numeric($_GET["pilt"])&&!empty($_GET["pilt"])){
		$error = array('result'=>'Valik pole number: Palun vali pilt');
	}
	else if(is_numeric($_GET["pilt"])&& $_GET["pilt"]> count($pics)){
		$error = array('result'=>'Sellist pilti pole: Palun vali pilt');
	}
	else if (!file_exists($pics[htmlspecialchars($_GET["pilt"])]['src'])) {
		$error = array('result'=>'Sellist faili pole: Palun vali pilt');
	}
	
		
?>
<div id="wrap">
	<h3>Valiku tulemus</h3>
	
			
			<?php if(count($error)<=0):?>
			
			<p>
			<label for="<?php echo $pics[htmlspecialchars($_GET["pilt"])]['label']; ?>" >
				<img src="<?php echo $pics[htmlspecialchars($_GET["pilt"])]['src']; ?>" alt="<?php echo $pics[htmlspecialchars($_GET["pilt"])]['alt']; ?>" />
			</label>
			</p>
			<?php else : ?>
			<p class="error"><?php echo $error['result'];?></p>
			<a href="vote.php">Hääletamine</a>
			<?php endif;?>
		
		
	

</div>
<?php 
	require_once('foot.html'); 
?>
