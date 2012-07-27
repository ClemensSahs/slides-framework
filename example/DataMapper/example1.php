<?php

namespace Slides\Example;

use Slides\DataMapper\MapperManager;


require_once __DIR__ . '/library/Slides/DataMapper/MapperManager.php';
$config = require_once __DIR__ . '/example/mapperConfig.php';

$mapperManager = new MapperManager();
$mapperManager->setConfig($config);
$user = $mapperManager->findDataObject('user')
					  ->where()->equal('primaryKey', 1 )
					  ->getRowSet()
					  ->current();

if ( $user->userName === 'foo' ) {
	$user->userName = 'bar';
} else {
	$user->userName = 'foo';
};

$user->save();
