<?php

//set timezone
date_default_timezone_set('Europe/Berlin');

//site address
define('DIR','http://localhost/Splendr-mvc/');
define('DOCROOT', dirname(__FILE__));

// Credentials for the local server
define('DB_TYPE','mysql');
define('DB_HOST','db.f4.htw-berlin.de');
define('DB_NAME','_s0533453__products');
define('DB_USER','s0533453');
define('DB_PASS','password');

// // Credentials for the local server
// define('DB_TYPE','mysql');
// define('DB_HOST','localhost');
// define('DB_NAME','products');
// define('DB_USER','root');
// define('DB_PASS','');

// Credentials for the HTW server
// define('DB_HOST','db.f4.htw-berlin.de');
// define('DB_NAME','_beierm__products');
// define('DB_USER','beierm');
// define('DB_PASS','bummelletzter');

//set prefix for sessions
define('SESSION_PREFIX','splendr_');

//optionall create a constant for the name of the site
define('SITETITLE','Splendr');