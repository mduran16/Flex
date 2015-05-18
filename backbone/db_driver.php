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
			$query .=  $property . " " . $meta['type'];
			if(isset($meta['length'])) $query .= "(".$meta['length'].")";
			$query .= ", ";	
		};
		$query .= "primary key (". $tableName ."_id)";
		$query .= ");";
		
		print "<p>" . $query . "</p>";
		
		if(mysql_query($query,$this->link)) {
			echo "Table " . $tableName . " created successfully";
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

	function purgeDB(){
		$query = "SELECT concat('DROP TABLE IF EXISTS ', table_name, ';')
		FROM information_schema.tables
		WHERE table_schema = '".$GLOBALS['db_name']."';";

		$results = mysql_query($query,$this->link);
		if(!$results) echo "<p>Error flushing db: " . mysql_error($this->link) . "</p>";
		else{
			$dropQuery = null;

			while($row = mysql_fetch_assoc($results)){
				$dropQuery .= array_values($row)[0];
				print $dropQuery . "<br/>";
				if(mysql_query(array_values($row)[0],$this->link))
					print "Table dropped successfully.<br/>";
				else
					print "Error dropping table.<br/>";
			}
		}
	}
}