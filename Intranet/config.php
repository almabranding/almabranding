<?php

define('TEMP', '/almabranding/');
define('URL', 'http://'.$_SERVER['HTTP_HOST'].TEMP.'/intranet/');
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'almaweb');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');
define('UPLOAD_ABS', URL.'../uploads/');
define('UPLOAD', '../uploads/images/');