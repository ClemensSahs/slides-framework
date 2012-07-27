<?php 


return array(
    'class'=>'Slides\DataMapper\Storage\PhpMysql',
    'option'=>array(
        'db.host'=>'localhost',
        'db.user'=>'localhost',
        'db.password'=>'localhost',
        'db.dbname'=>'localhost',
        'db.table'=>array(
            'user'=>'user'
        )
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