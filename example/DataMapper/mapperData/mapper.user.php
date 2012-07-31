<?php 

return array(
    'objectClass'=>'Slides\DataMapper\DataObject\DataObject',
    'mapperClass'=>'Slides\DataMapper\Mapper\SimpleMapper',
    'id'=>'id',
    'property'=>array(
        'id'=>array(
            'storage'=>'db.user',
            'name'=>'user.id',
        ),
        'name'=>array(
            'storage'=>'db.user',
            'name'=>'user.name',
        )
    )
);