<?php

namespace Slides\Example;

use Slides\DataMapper\MapperManager;


require_once __DIR__ . '/library/Slides/DataMapper/MapperManager.php';
$config = require_once __DIR__ . '/example/mapperConfig.php';

$mapperManager = new MapperManager();
$mapperManager->setConfig($config);
$userGateway = $mapperManager->getDataObjectGateway('user');
$user = $userGateway->is('activ', true )
				   ->AND
				   ->lessThan('regTime',$now)
				   ->getRowSet();

foreach ( $userList as $user ) {
	echo $user->userName . "<br />\n";
}