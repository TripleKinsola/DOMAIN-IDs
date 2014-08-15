<?php require_once 'includes/header.inc.php'; ?>
	<div class="container">
		<div class="col-1">
			<?php
				require 'classes/col_1.php';
				$primary_names = new pry_sug;
				$primary_names->return_names();
			?>
		</div>
		<div class="col-la">
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
				$other_sug->delete_sug();
			?>
		</div>
	</div>
<?php require_once 'includes/footer.inc.php'; ?>
