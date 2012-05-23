<?php

namespace Slides\Example;

use Slides\DataMapper\MapperManager;


require_once __DIR__ . '/library/Slides/DataMapper/MapperManager.php';
$config = require_once __DIR__ . '/example/mapperConfig.php';

$mapperManager = new MapperManager();
$mapperManager->setConfig($config);
$user = $mapperManager->findDataObject('user')
					  ->where()->egual('primaryKey', 1 )
					  ->getRowSet()
					  ->current();

$group = $user->getReference( 'group' );

echo $group->groupName;
