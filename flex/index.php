<?
require_once 'includes.php';
require_once '../backbone/includes.php';

#####
## SYNC
## sync operation synchronizes database with various application models.
## automatically creates and executes database structure realated queries
#####
if($_SERVER['QUERY_STRING'] == 'sync'){

	includeModels();

	$result = array();
	foreach (get_declared_classes() as $class) {
		if (is_subclass_of($class, 'Model'))
		{
			$tempClass = new $class;
			$result[] = $tempClass;
			foreach(get_object_vars($tempClass) as $property => $string){
				print $property."<br/>";
			};
		}
	}
}


#####
## FLUSH
## Drops all tables from the database and recreates database.
#####
if($_SERVER['QUERY_STRING'] == 'flush'){

	includeModels();

	$result = array();
	$DB->purgeDB();
	foreach (get_declared_classes() as $class) {
		if (is_subclass_of($class, 'Model'))
		{
			$DB->createTable($class,new $class);
		}
	}
}


function includeModels(){
	foreach ($GLOBALS['applications'] as $application){
		include_once "../".$application.'/models.php';
	}
}