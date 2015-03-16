<?
require_once('../flex/settings.php');

$DB = new Database();

class Database {
	private $link;

	function __construct(){
		$this->link = mysql_connect($GLOBALS['db_host'], $GLOBALS['db_user'], $GLOBALS['db_pass']);
		if (!$this->link) {
		    die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($GLOBALS['db_name'], $this->link);
	}

	function close(){
		mysql_close($this->link);
		print "connection closed";
	}

	function createTable($tableName=null,$model=null){
		$objectVars = get_object_vars($model);
		$query = "create table ". $tableName . "(";

		$query .= $tableName . "_id int auto_increment,";

		foreach($objectVars as $property => $string){
			$meta = $model->$property;
			var_dump($meta);
			$query .=  $property . " " . $meta['type'];
			if(isset($meta['length'])) $query .= "(".$meta['length'].")";
			$query .= ", ";	
		};
		$query .= "primary key (". $tableName ."_id)";
		$query .= ");";
		
		print "<p>" . $query . "</p>";

		if(mysql_query($query,$this->link)) {
			echo "Table MyGuests created successfully";
		} else {
			echo "<p>Error creating table: " . mysql_error($this->link) . "</p>";
		}
	}

	function deleteTable($tableName=null){
		print "deleteTable";
	}

	function ammendTable($table=null, $ammendments=null){
		print "ammendTable";
	}

	function insertRecord($table=null, $recordData=null){
		print "insertRecord";
	}

	function deleteRecord($pk=null){
		print "deleteRecord";
	}

	function updateRecord($pk=null,$currentRecord=null,$updateRecord=null){
		print "updateRecord";
	}
}