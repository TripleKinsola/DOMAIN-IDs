<?php
/**
* 
*/
class form{
	function __construct(){
		echo "<form method=\"post\" action=\"index.php\" class=\"form-dec\">";
		echo "<img class=\"img-circle\" src=\"graphics/icon.png\">Add to";  
		echo "<input type = \"text\" name=\"data\" placeholder = \"...other suggestions....\" />";
		echo "<input type=\"submit\" name=\"add_file\" value=\"< Add In! >\" / >";
		echo "</form>";
	}
	public function process_form(){
		if (isset($_POST['add_file'])) {
			if (!empty($_POST['data']) && isset($_POST['data'])) {
				$handle_param = $_POST['data'];
				$handle = fopen('file/file.txt', 'a');
				fwrite($handle, "<i>" . $handle_param ."</i><b>.com</b>\n");
				fclose($handle);
				header('Location: index.php?msg=' . sha1('success'));
			}else{
				echo "<blockquote class=\"text-danger\">Please input your suggest.</blockquote><br />";
			}
		}
	}
	public function no_input(){
		if (isset($_GET['msg'])) {
			echo "<blockquote class=\"text-success\">Thanks! <br />Your suggestion has been accepted<br /> and added to other suggestions!</blockquote><br />";
		}
	}
}
?>