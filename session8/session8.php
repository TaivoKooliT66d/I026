<?php 

$bg_color="#FFFFFF"; // white
$text_color="#000000"; //black
$line_color="#000000";//black
$button_color="#4CAF50"; // Green
$style = "none";
$line_style = "none";
$border_width = 0;
$border_radius = 0;

if (isset($_POST['bg_color']) && $_POST['bg_color']!="") {
    $bg_color = htmlspecialchars($_POST['bg_color']);
}
if (isset($_POST['text_color']) && $_POST['text_color']!="") {
    $text_color = htmlspecialchars($_POST['text_color']);
}
if (isset($_POST['line_color']) && $_POST['line_color']!="") {
    $line_color = htmlspecialchars($_POST['line_color']);
}
if (isset($_POST['button_color']) && $_POST['button_color']!="") {
    $button_color = htmlspecialchars($_POST['button_color']);
}
if (isset($_POST['style']) && $_POST['style']!="") {
    $style = htmlspecialchars($_POST['style']);
}
if (isset($_POST['line_style']) && $_POST['line_style']!="") {
    $line_style = htmlspecialchars($_POST['line_style']);
}
if (isset($_POST['border_width']) && $_POST['border_width']!="") {
    $border_width = htmlspecialchars($_POST['border_width']);
}
if (isset($_POST['border_radius']) && $_POST['border_radius']!="") {
    $border_radius = htmlspecialchars($_POST['border_radius']);
}

/*

htmlspecialchars funktsioon on turvalisuse eesmärgil vajalik selleks, et kasutaja poolt sisestatud väärtus ei sisaldaks html jaoks tähenduslikke märke.
CSS kood, kus prinditakse omaduste väärtused php muutujatest. A'la
body {background: <?php echo $bg_col; ?>; }
Tulemuse ilusamaks tegemiseks võib CSS-is olla ka staatilist stiili. Nt. teksti sisaldava elemendi suurus, padding, marginid etc.
*/
 ?>
<!DOCTYPE html>
<html lang="et">
<title>I244 session 8 - Request handling</title>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Taivo Liik">
<style>
	body {
		background: <?php echo $bg_color; ?>; 
		color: <?php echo $text_color; ?>;
		 <?php
			if($style == 'underline' || 'none'){
				echo 'text-decoration: '.$text_weight;
			}	
			if($style == 'italic'){
				echo 'font_style: '.$text_weight;
			}	
			if($style == 'bold'){
				echo 'font_weight: '.$text_weight;
			}
		 ?>;
	}
	.frame{
		display:inline-block;
		margin: 20px;
		padding:20px;
		width:400px;
		border: <?php echo $border_width.'px '.$line_style.' '.$line_color; ?>;
		border-radius: <?php echo $border_radius.'px'?>;
	}

	.color label,.inputs{
		display: inline-block;
		float: left;
		width: 50%;
		text-align: right;
	
		
	}
	.color input{
		display: inline-block;
	}
	.slider_number{
		float:right;
		width:35px;
		
	}
	.inputs{
		margin-bottom:50px;
	}
	.inputs{
		background-color: <?php echo $button_color; ?>;
		text-align: center;
		font-size: 30px;
		cursor: pointer;
		width: 200px;
		
		
	}
	h1{
		font-size: 16px;
		margin-bottom: -20px;
	
		
		
	}

	
</style>
<script>
function updateTextInput(val, element) {
          document.getElementById(element).value=val; 
        }
</script>



<body>
<!-- HTML element kuhu kasutaja sisestatud teksti välja printida
HTML vorm, kus on väljad teksti/kommentaari ja erinevate css omaduste (oma valik) väärtuste jaoks. Näiteks
taustavärvus
teksti värvus
piirjoone värvus
piirjoone stiil
piirjoone laius
piirjoone raadius nurkades
jne.-->
		<div>
		<form action="" method="post">
			<h1>Värvid</h1>
			<div class="frame">
				<div class="color">
					<label>Taustavärv:</label><input type="color" class="color_input" value="<?php echo $bg_color; ?>" name="bg_color"/>
				</div>
				<div class="color">
					<label>Teksti värv:</label><input type="color" class="color_input" value="<?php echo $text_color; ?>"  name="text_color"/>
				</div>
				<div class="color">
					<label>Piirjoone värv:</label><input type="color" class="color_input" value="<?php echo $line_color; ?>" name="line_color"/>
				</div>				
				<div class="color">
					<label>Nupu värv:</label><input type="color" class="button_color" value="<?php echo $button_color; ?>" name="button_color"/>
				</div>
			</div>
			<h1>Kirja stiil</h1>
			<div class = "color frame">

				<div class="color">
							
					<input type="radio" 
						<?php
						if($style == 'underline'){
						echo 'checked="checked"';
						}	?>	
						name="style" value="underline"> <label>allajoonitud</label>
				</div>
				<div class="color">	
					<input type="radio" 	
						<?php if($style == 'italic'){
						echo 'checked="checked"';
						}	?>
						name="style" value="italic"><label>krusiiv</label>
				</div>
				<div class="color">	
					<input type="radio"
						<?php if($style == 'bold'){
							echo 'checked="checked"';
						}?>
						name="style" value="bold"><label>paks</label>
				</div>
				<div class="color">	
					<input type="radio" 
							<?php
						if($style == 'none'){
						echo 'checked="checked"';
						}	?>
						name="style" value="none"><label>puudub</label>
				</div>
			</div>
			<h1>Piirjoone stiil</h1>
			<div class="color frame">
				<div class="color">
					<input type="radio"
							<?php
						if($line_style == 'dotted'){
						echo 'checked="checked"';
						}	?>
						name="line_style" value="dotted"><label>täpiline</label>
				</div>
				<div class="color">	
					<input type="radio" 
							<?php
						if($line_style == 'solid'){
						echo 'checked="checked"';
						}	?>
						name="line_style" value="solid"><label>ühtlane</label>
				</div>
				<div class="color">				
					<input type="radio" 
							<?php
						if($line_style == 'double'){
						echo 'checked="checked"';
						}	?>
						name="line_style" value="double"><label>topelt</label>
				</div>
				<div class="color">
					<input type="radio" 
							<?php
						if($line_style == 'dashed'){
						echo 'checked="checked"';
						}	?>					
						name="line_style" value="dashed"><label>punktiir</label>
				</div>
				<div class="color">
					<input type="radio" 
							<?php
						if($line_style == 'none'){
						echo 'checked="checked"';
						}	?>					
						name="line_style" value="none" ><label>puudub</label>
				</div>
			</div>
			<h1>Piirjoone paksus ja raadius</h1>
			<div class="frame">
				<div class="color">
					<label>Piirjoone laius px</label><input type="range" value="<?php echo $border_width; ?>" name="border_width" onchange="updateTextInput(this.value,'slidervalue_border_width');">
					<input class="slider_number" type="number" id="slidervalue_border_width" value="<?php echo $border_width; ?>" >
				</div>
				<div class="color">
					<label>Piirjoone raadius px</label><input type="range" value="<?php echo $border_radius; ?>" name="border_radius" onchange="updateTextInput(this.value,'slidervalue_border_radius');">
					<input class="slider_number" type="number" id="slidervalue_border_radius" value="<?php echo $border_radius; ?>" >

				</div>
			</div>
			
			<div class="color">
						<input class="inputs"type="submit" value="Submit"> 
			</div>		
			
		</form>
		
			
		</div>

</body>
</html>

