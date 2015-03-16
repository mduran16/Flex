<?
require_once('../flex/settings.php');

$DB = new Database();

class Database {
	private $link;
	private $db;

	function __construct(){
		$this->link = mysql_connect($GLOBALS['db_host'], $GLOBALS['db_user'], $GLOBALS['db_pass']);
		if (!$this->link) {
		    die('Could not connect: ' . mysql_error());
		}
		echo 'Connected successfully';
		$this->db = mysql_select_db($GLOBALS['db_name'], $this->link);
	}

	function close(){
		mysql_close($this->link);
		print "connection closed";
	}

	function createTable($tableName=null,$meta=null){
		print "createTable";
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