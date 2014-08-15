<?php
/**
* Object for other user declear domains
*/
class other_sug{
	function __construct(){
		echo "</blockquote><b>Other suggests</b><blockquote>";
		if (!is_dir("file/file.txt")) {
			$handle = fopen('file/file.txt', 'a');
			fclose($handle);
		}
		$readin = file('file/file.txt');
		foreach ($readin as $key => $value) {
			echo "(".$key.") " . $value . "<br />";
		}
		echo "</blockquote>";

	}
}
?>