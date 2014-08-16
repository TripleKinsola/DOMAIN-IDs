<?php
/**
* The first column for the primary suggestion class
*/
class pry_sug{
	private $must_extension = ".com";
	private $pry = array("TurnTables", "NexTable", "TiTable", "NoBoard", "EaseTable", "SeTable", "InTable", "OnTable", "TableCheck", "CatchTable", "Titarray", "Tablarray", "existable", "NexClass", "ClassTab");
	function __construct(){
		echo "<b>Primary suggestions</b><blockquote>";
	}
	public function get_pry_names(){
		print_r($this->pry) ;
	}
	public function return_names(){
		foreach ($this->pry as $key => $value) {
				echo "[" . $key . "] <i>" . $value ."</i><b>". $this->must_extension . "</b><br />";
		}
	}
}
?>