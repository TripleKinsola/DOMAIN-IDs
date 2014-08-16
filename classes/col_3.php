<?php
/**
* Object for other user declear domains
*/
class other_sug{
	private $drop_msg = "Mind you, if you do that, all your suggested names will be gone. Do you still want to continue?";
	function __construct(){
		echo "</blockquote><b>Other suggests</b><blockquote>";
		if (!file_exists("file/file.txt")) {
			$handle = fopen('file/file.txt', 'a');
			fclose($handle);
		}
		$readin = file('file/file.txt');
		foreach ($readin as $key => $value) {
			echo "[".$key."] " . $value . "<br />";
		}
		echo "</blockquote>";

	}
	public function delete_sug(){
		echo "<a onclick = \"return confirm('$this->drop_msg');\" href = 'index.php?action=" .sha1("drop"). "'>Drop all suggestions</a>";
		if (isset($_GET['action']) == sha1("drop")) {
			unlink("file/file.txt");
		}
	}
}
?>