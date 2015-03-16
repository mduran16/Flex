<?php
require_once('../backbone/models.php');
class TestModel extends Model{

	function __construct(){
		$this->testString = parent::CharField($max_length=200);
		$this->testNum = parent::IntegerField();
		$this->testText = parent::TextField();
		$this->testDate = parent::DateField($auto_add_now=true);
	}
}
?>