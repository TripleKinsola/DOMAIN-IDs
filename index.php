<!DOCTYPE html>
<html>
<head>
	<title>DOMAIN IDs</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
	<div class="page-header"><a href = "index.php">Proposed Domain IDs</a></div>
	<div class="container">
		<div class="col-1">
			<?php
				require 'classes/col_1.php';
				$primary_names = new pry_sug;
				$primary_names->return_names();
			?>
		</div>
		<div class="col-1">
			<?php
				require 'classes/col_2.php';
				$d_form = new form;
				$d_form->process_form();
				$d_form->no_input();
			?>
		</div>
		<div class="col-1">
			<?php
				require 'classes/col_3.php';
				$other_sug = new other_sug;
			?>
		</div>
	</div>
	<footer>
		&copy All Right Reserved at my Mummy's kitchen, <?php echo date("Y"); ?>.
	</footer>>
</body>
</html>