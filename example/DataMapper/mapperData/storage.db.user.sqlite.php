<?php 


return array(
    'class'=>'Slides\DataMapper\Storage\PhpSQLite',
    'option'=>array(
        'db.file'=>__DIR__ . '/sqlite.db',
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