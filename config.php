<?php

define( "DB_HOST", "localhost" );
define( "DB_NAME", "dijitalpano");
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );

define( "UPLOAD_DIR", "upload/" );
define( "SHEET_DIR", UPLOAD_DIR . "sheet/" );
define( "VIDEO_DIR", UPLOAD_DIR . "video/" );
define( "IMG_DIR", UPLOAD_DIR . "img/" );
define( "IMG_SLIDE_DIR", IMG_DIR . "slide/" );
define( "IMG_LAYOUT_DIR", IMG_DIR . "layout/" );
define( "IMG_THUMB_DIR", IMG_DIR . "thumbnail/" );


define( "GUNLER", [
    'Pazartesi',
    'Salı',
    'Çarşamba',
    'Perşembe',
    'Cuma',
    'Cumartesi',
    'Pazar'
]);

require_once 'src/Upload.php';
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
require_once 'model/Video.php';
require_once 'model/Thumbnail.php';
require_once 'model/Css.php';

include 'vendor/autoload.php';