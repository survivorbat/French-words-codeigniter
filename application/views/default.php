<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
		<title>Roncalli Woordjes Overhoren</title>
		<meta charset="UTF-8">
		<meta name="description" content="Mpl generator">
		<meta name="author" content="Maarten van der Heijden">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
			<div class='header'>
				<h1>Roncalli Woordjes Overhoren</h1>
			</div>
			<div class='content'>
			<?php echo form_open(); ?>
				<fieldset class='inputform'>
					<legend>Genereer een nieuwe lijst</legend>
					<span id="melding"></span>
					<ul>
						<li>
							<label for='van'>Van</label>
							<select id="van"><?php for($i=1;$i<61;$i++){echo "<option value='$i'>Unité $i</option>";}	?></select>
						</li>
						<li>
							<label for='tot'>Tot</label>
							<select id="tot"><?php for($i=1;$i<61;$i++){echo "<option value='$i'>Unité $i</option>";}?></select>
						</li>
						<li>
							<label for='amount'>Aantal woorden</label>
							<input type="number" style='width:4em' min='1' max='1700' size="2" id="amount" value='20'>
						</li>
						<li>
							<button type="button" onClick="generateList('overhoren')">Overhoren</button>
						</li>
						<li>
							<button type="button" onClick="generateList('lijst')">Woordenlijst</button>
						</li>
					</ul>
				</fieldset>
			<?php echo form_close();?>
			<div style='display:none' class='result'>
				<div class="resultarea">
					Mots pour lire Unité <span id="l"></span><span id="tussen"></span><span id="h"></span><br><br>
					<table id="resultlist"></table>
					<h3>--- Bonne chance! ---</h3>
					<div id='nakijkknop' style='display:none;text-align:center'>
						<button id="nakijkknop" type="button" onclick="check()">Nakijken</button>
					</div>
					<div class='printbutton'>
						<a href="javascript:window.print()">Print deze lijst</a>
					</div>
				</div>
			</div>
			<span class="footer">
				<p style="">Copyright © <script type="text/javascript"> var d = new Date(); document.write(d.getFullYear()) </script> Heijden Solutions</p>
			</span>
			</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
