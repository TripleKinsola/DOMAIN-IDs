<?php
/**
* The first column for the primary suggestion class
*/
class pry_sug{
	private $must_extension = ".com";
	private $vote_val = 0;
	private $abbr = "<abbr title='click to add your vote'>";
	private $pry = array("TurnTables", "NexTable", "TiTable", "NoBoard", "EaseTable", "SeTable", "InTable", "OnTable", "TableCheck", "CatchTable", "Titarray", "Tablarray", "existable", "NexClass", "ClassTab");
	function __construct(){
		echo "<b>Primary suggestions</b><blockquote>";
		$this->create_v_file('file/vote/pry_sug.txt');
	}
	public function get_pry_names(){
		return $this->pry;
	}
	private function d_vote($v_val = 1){
		if ($v_val <= 1) {
			return $this->abbr." <a href = 'index.php'><b>".$this->vote_val."</b> vote</a></abbr> ";
		}else{
			return $this->abbr." <a href = 'index.php'><b>".$this->vote_val."</b> votes</a></abbr> ";
		}
	}
	public function get_vote_val(){
		return $this->d_vote();
	}
	private function create_v_file($path){
		if (!file_exists($path)) {
			$handle = fopen($path, 'a');
			fclose($handle);
		}
	}
	public function return_names_param(){
		foreach ($this->pry as $key => $value) {
			echo "[" . $key . "] <i>" . $value ."</i><b>". $this->must_extension . "</b>  (" .$this->get_vote_val() . ")<br />";
		}
	}
}
/**
* 
*/
class vote extends pry_sug{
}
?>