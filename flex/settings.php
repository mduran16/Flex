<?php
#####
## Application wide settings
#####
$GLOBALS['root_url'] = 'http://localhost/';
$GLOBALS['assets_path'] = '/';
$GOLBALS['BASEPATH'] = __DIR__;

#####
## Database Settings
#####
$GLOBALS['db_host'] = 'localhost';
$GLOBALS['db_name'] = 'test';
$GLOBALS['db_user'] = 'root';
$GLOBALS['db_pass'] = '';
$GLOBALS['db_type'] = 'mysql';

#####
## Enabled Applications
#####
$GLOBALS['applications'] = [
	'testApp',
	];

#####
## Development Settings
#####
$GLOBALS['production'] = false;
$GLOBALS['debug'] = true;