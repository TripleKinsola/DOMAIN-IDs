<?php
/**
* Object for other user declear domains
*/
class other_sug{
	function __construct(){
		echo "</blockquote><b>Other suggests</b><blockquote>";
		if (!file_exists("file/file.txt")) {
			$handle = fopen('file/file.txt', 'a');
			fclose($handle);
		}
		$readin = file('file/file.txt');
		foreach ($readin as $key => $value) {
			echo "(".$key.") " . $value . "<br />";
		}
		echo "</blockquote>";

	}
	public function delete_sug(){
		echo "<a onclick = \"return confirm('Are you sure you want to do that?');\" href = 'index.php?action=" .sha1("drop"). "'>Drop all suggestions</a>";
		if (isset($_GET['action']) == sha1("drop")) {
			unlink("file/file.txt");
		}
	}
}
?>