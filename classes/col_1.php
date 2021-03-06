<?php
/**
* The first column for the primary suggestion class
*/
class pry_sug{
	private $must_extension = ".com";//traditionally neccessary
	private $abbr = "<abbr title='click to make your vote'>";
	//
	//prymary suggested propertiy
	private $pry = array("TurnTables", "NexTable", "TiTable", "NoBoard", "EaseTable", "SeTable", "InTable", "OnTable", "TableCheck", "CatchTable", "Titarray", "Tablarray", "existable", "NexClass", "ClassTab");
	///
	//private $drop_v_param = "<br /><a href = 'index.php?v_drop=dropping' onclick= "\return alart('test');\">Drop all votes!</a>";
	function __construct(){
		echo "<b>Primary suggestions</b><blockquote>";
		$this->create_v_file('file/vote/pry_sug.txt');
	}
	public function get_pry_names(){
		return $this->pry;
	}
	private function vote_dropper($value=''){
		if (isset($_Get['v_drop'])) {
			header('Location: index.php?vo_drop=' . sha1('v_dropped'));
		}
		$output = "<br /><a href = 'index.php'"." onclick= \"return alert('Click on the VOTE link in front of the name of your choice; where the present voted status is shown.');\">"."How can one vote?</a>";
		$output .= "<br /><a href = 'index.php?v_drop=dropping'"." onclick= \"return alert('Please, you will need a passphrase to complete that.');\"><button>"."Drop all votes!</button></a>";
		return $output;
	}
	private function read_vote($path, $id_name){
		//reads the voting files and output readable strings
		$readin = file($path);
		foreach ($readin as $key => $value) {
			if ($value <= 1) {
				$word = "vote";
			}else{
				$word = "votes";
			}
			$add = $value+1;//increament for vote processing
			return $this->abbr." <a href = 'index.php?".$id_name."=".$add."'><b><span class=\"badge\">".$value."</span></b> ".$word."</a></abbr> ";
		}
	}
	private function create_v_file($path){
		//file and path creator
		if (!file_exists($path)) {
			$handle_param = 0;
			$handle = fopen($path, 'w');
			fwrite($handle, $handle_param);
			fclose($handle);
		}
	}
	public function return_names_param(){
		//method that serves as the engine room of the object
		foreach ($this->pry as $key => $value) {
			//if required file do not exist
			$this->create_v_file('file/vote/' . $value . ".txt");
			/////
			///Output looping of primary array
			echo "[" . $key . "] <i>" . $value ."</i><b>". $this->must_extension . "</b>  ";
			/////
			///Vote reader
			echo $this->read_vote('file/vote/' . $value . ".txt", $value);
			///////
			//Vote counter processor....
			if (isset($_GET[$value])) {
				$handle_param = $_GET[$value];
				$handle = fopen('file/vote/' . $value . ".txt", 'w');
				if (fwrite($handle, $handle_param)) {
					header('Location: index.php?rep=' . sha1("vote"));
				}
				fclose($handle);
			}
			/////////
			echo "<br />";//newline break for each looping
		}
		echo $this->vote_dropper();
	}
}
/**
* 
*/
class vote extends pry_sug{
}
?>