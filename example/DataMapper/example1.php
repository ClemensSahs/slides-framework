<?php
namespace Slides\Example;

use Slides\DataMapper\MapperManager;

require_once __DIR__ . '/../bootstrap.php';

// require_once __DIR__ . '/library/Slides/DataMapper/MapperManager.php';
$config = require_once __DIR__ . '/mapperData/mapperConfig.php';

$mapperManager = new MapperManager();
$mapperManager->setConfig($config);
// $mapperManager->init();

$userMapper = $mapperManager->getMapper('user');


$userObject = new \Slides\DataMapper\DataObject\DataObject();
$userObject->set('id','1');
$userObject->set('user','test');

$userMapper->save( $userObject );

// $userGateway = $mapperManager->getDataObjectGateway('user');

// $user = $userGateway->find( 1 ) #find by primaryKey
// 				    ->current();

// if ( $user->userName === 'foo' ) {
// 	$user->userName = 'bar';
// } else {
// 	$user->userName = 'foo';
// };

// $user->save();
