<?php 
	require_once('head.php'); 
	require_once('pic_array.php'); 
?>

<div id="wrap">
	<h3>Vali oma lemmik :)</h3>
	<form action="tulemus.php" method="GET">
		<?php foreach($pics as $key=>$value): ?>
		<p>
			<label for="<?php echo $value['label']; ?>" >
				<img src="<?php echo $value['src']; ?>" alt="<?php echo $value['alt']; ?>" height="100"/>
			</label>
			<input type="radio" value="<?php echo $key; ?>"  id="<?php echo $value['label']; ?>"  name="pilt"/>
		</p>
		<?php endforeach; ?>
	
		<br/>
		<input type="submit" value="Valin!"/>
	</form>

</div>
<?php 
	require_once('foot.html'); 
?>
