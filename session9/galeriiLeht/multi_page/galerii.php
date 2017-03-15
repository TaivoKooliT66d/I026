<?php 
	require_once('head.php'); 
	require_once('pic_array.php'); 
?>

<div id="wrap">
	<h3>Fotod</h3>
	<div id="gallery">
	
		<?php foreach($pics as $key=>$value): ?>
			<img src="<?php echo $value['src']; ?>" alt="<?php echo $value['alt']; ?>"/>
		<?php endforeach; ?>
	</div>
</div>
<?php 
	require_once('foot.html'); 
?>
