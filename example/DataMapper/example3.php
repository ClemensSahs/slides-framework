<?php

namespace Slides\Example;

use Slides\DataMapper\MapperManager;


require_once __DIR__ . '/library/Slides/DataMapper/MapperManager.php';
$config = require_once __DIR__ . '/example/mapperConfig.php';

$mapperManager = new MapperManager();
$mapperManager->setConfig($config);
$group = $mapperManager->findDataObject('group')
					   ->where()->egual('primaryKey', 1 )
					   ->getRowSet()
					   ->current();

$userList = $group->getReferenceList('user');

foreach ( $userList as $user ) {
	echo $user->userName . "<br />\n";
}