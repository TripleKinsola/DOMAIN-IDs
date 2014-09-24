
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
				echo "<blockquote class=\"text-danger\">Please input your suggestion.</blockquote><br />";
			}
		}
	}
	private function drop_form(){
		$param = "<br /><br /><form action = 'index.php?drop_key' method = 'post'>";
		$param .= "Here we go ";
		$param .= "<input type = 'text' name = 'drop_key' placeholder = '...your passphrase'>";
		$param .= "<input type = 'submit' value = 'Do it!'></form>"; 
		$param .= "<a href = 'index.php'><button> Cancel!</button></a>";
		return $param;
	}
	private function drop_form_alg(){
		$k = "3442496b96dd01591a8cd44b1eec1368ab728aba";
		if (isset($_POST['drop_key'])) {
			$d_key = $_POST['drop_key'];
			if (sha1($d_key) == $k) {
				$out = array_map('unlink', glob("file/vote/*.txt"));
				if ($out) {
					header('Location: index.php?drp=' . sha1('drp'));
				}
			}else{
				return "<blockquote class=\"text-danger\"><br />Authentication failure! <a href= 'index.php?v_drop=dropping'>Try again.</a></blockquote>";
			}
		}
	}
	public function no_input(){
		if (isset($_GET['msg'])) {
			echo "<blockquote class=\"text-success\">Thanks! <br />Your suggestion has been accepted<br /> and added to other suggestions!</blockquote><br />";
		}elseif (isset($_GET['action'])) {
			echo "<blockquote class=\"text-danger\">Deletion successful!</blockquote>";
		}elseif (isset($_GET['rep']) == sha1("vote")) {
			echo "<blockquote class=\"text-success\">Success! Your vote counts.</blockquote>";
		}elseif (isset($_GET['v_drop'])) {
			echo $this->drop_form();
		}elseif (isset($_GET['drop_key'])) {
			echo $this->drop_form_alg();
		}elseif (isset($_GET['drp'])) {
			echo "<blockquote class=\"text-success\">Done!</blockquote><br />";
		}
	}
}
?>