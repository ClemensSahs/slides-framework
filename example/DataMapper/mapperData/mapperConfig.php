<?php

return array(
    'mapper'=>array(
        'user'=>require __DIR__ . '/mapper.user.php'
    ),
    'storage'=>array(
        'db.user'=>require __DIR__ . '/storage.db.user.sqlite.php'
    )


);