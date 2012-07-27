<?php

namespace Slides\Example;

use Slides\DataMapper\MapperManager;


require_once __DIR__ . '/library/Slides/DataMapper/MapperManager.php';
$config = require_once __DIR__ . '/example/mapperConfig.php';

$mapperManager = new MapperManager();
$mapperManager->setConfig($config);
$userList = $mapperManager->findDataObject('user')
					   ->where()->in('primaryKey', array(1,2,3,4,5) )
					   ->getRowSet();

foreach ( $userList as $user ) {
	echo $user->userName . "<br />\n";
}