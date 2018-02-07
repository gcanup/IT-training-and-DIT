<?php

if($_SERVER['HTTP_HOST']=='localhost'){
	define('HOST','localhost');
	define('USERNAME','root');
	define('PASSWORD','usbw');
	define('DATABASE_NAME','database_alisha');
    define('SITE_URL','http://localhost/alisha/'); // url of our site
   	define('SITE_PATH',$_SERVER['DOCUMENT_ROOT']."/alisha/"); // path of our site
	define('SITE_FRONT_URL','http://localhost/alisha/'); // url of our admin panel
	define('SITE_FRONT_PATH',$_SERVER['DOCUMENT_ROOT']."/alisha/"); //path of our admin panel
	define('RESUME_PATH',$_SERVER['DOCUMENT_ROOT']."/alisha/resume/"); //path of our gallery
	define('RESUME_URL',SITE_URL."resume/"); //url of our gallery
}   
    
?>