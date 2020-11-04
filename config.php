<?php

define( "DB_HOST", "localhost" );
define( "DB_NAME", "dijitalpano");
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );

define( "UPLOAD_DIR", "upload/" );

define( "HAFTALAR", [
    1 => 'Pazartesi',
    2 => 'Salı',
    3 => 'Çarşamba',
    4 => 'Perşembe',
    5 => 'Cuma',
    6 => 'Cumartesi',
    0 => 'Pazar'
]);

require_once 'src/Entity.php';
require_once 'src/Controller.php';
require_once 'src/Template.php';
require_once 'src/DatabaseConnection.php';

require_once 'model/Kullanici.php';
require_once 'model/Sube.php';
require_once 'model/Duyuru.php';
require_once 'model/SubeDuyuru.php';
require_once 'model/Slide.php';
require_once 'model/Resim.php';
require_once 'model/Program.php';