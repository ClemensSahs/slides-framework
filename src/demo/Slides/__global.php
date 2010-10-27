<?php

define( 'DIR_SEP' , DIRECTORY_SEPARATOR );
define( 'DIR_BACK' , '..' . DIR_SEP );
define( 'DIR_SLIDES_DEMO_BASE' , realpath(dirname(__FILE__)) . DIR_SEP );
define( 'DIR_SLIDES_LIB' , realpath(dirname(__FILE__) . DIR_SEP . DIR_BACK . DIR_BACK ) . DIR_SEP . 'library' . DIR_SEP);

include_once DIR_SLIDES_DEMO_BASE . '__autoloader.php';