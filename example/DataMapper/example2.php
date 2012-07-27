<?php

namespace Slides\Example;

use Slides\DataMapper\MapperManager;


require_once __DIR__ . '/library/Slides/DataMapper/MapperManager.php';
$config = require_once __DIR__ . '/example/mapperConfig.php';

$mapperManager = new MapperManager();
$mapperManager->setConfig($config);
$userGateway = $mapperManager->getDataObjectGateway('user');
$user = $userGateway->find( 1 ) #find by primaryKey
				    ->current();

# n user to 1 group relation
$group = $mapperManager->getReference( $user, 'group' )->current();

echo $group->groupName;
