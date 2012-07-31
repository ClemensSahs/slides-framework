<?php 


return array(
    'class'=>'Slides\DataMapper\Storage\PhpSQLite',
    'option'=>array(
        'db.host'=>'192.168.170.5',
        'db.user'=>'BruCle',
        'db.password'=>'te5Tfd',
        'db.dbname'=>'bruce_clemens',
        'db.table'=>array(
            'user'=>array(
                'name'=>'user',
                'primary'=>array(
                    'user.id',
                ),
            ),
        ),
    ),
    'objectLink'=>array(
        'db.adapter'=>'db-adapter-name-in-DI-locator',
    ),
    'property'=>array(
        'user.id'=>array(
            'db.table'=>'user',
            'db.field.name'=>'id',
            'db.field.type'=>'integer',
            'db.field.length'=>'11',
        ),
        'user.name'=>array(
            'db.table'=>'user',
            'db.field.name'=>'name',
            'db.field.type'=>'string',
            'db.field.length'=>'250',
        )
    )
);