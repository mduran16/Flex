<?php
class testModel extends class Model{
	$testString = parent::CharField($max_length=200);
	$testNum = parent::IntegerField();
	$testText = parent::TextField();
	$test = parent::DateField($auto_add_now=true);
}