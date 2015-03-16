<?php
class Model {
	function CharField($max_length=null){
		return array(
			'type' => 'varchar',
			'length' => $max_length,
			);
	}
	function IntegerField($max_length=null){
		return array(
			'type' => 'int',
			'length' =>  $max_length,
			);
	}
	function TextField(){
		return array(
			'type' => 'mediumtext',
			);
	}
	function DateField($auto_add_now=null){
		return array(
			'type' => 'timestamp',
			);
	}
}