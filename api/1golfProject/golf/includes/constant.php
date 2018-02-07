<?php
if($_SERVER['HTTP_HOST']=='localhost'){
	define('HOST','localhost');
	define('USERNAME','root');
	define('PASSWORD','');
	define('DATABASE_NAME','my_db');
	define('SITE_URL','http://localhost/my_site/admin/'); // url of our site
	define('SITE_PATH',$_SERVER['DOCUMENT_ROOT']."/my_site/admin/"); // path of our site
	define('SITE_FRONT_URL','http://localhost/my_site/'); // url of our admin panel
	define('SITE_FRONT_PATH',$_SERVER['DOCUMENT_ROOT']."/my_site/"); //path of our admin panel
	define('GALLERY_PATH',$_SERVER['DOCUMENT_ROOT']."/my_site/admin/gallery/"); //path of our gallery
	define('GALLERY_URL',SITE_URL."gallery/"); //url of our gallery
}else{
	define('HOST','localhost');
	define('USERNAME','root');
	define('PASSWORD','');
	define('DATABASE_NAME','my_db');
	define('SITE_URL','http://www.ditsolution.com.np/'); // url of our site
	define('SITE_PATH',$_SERVER['DOCUMENT_ROOT']."/"); // path of our site
	define('SITE_ADMIN_URL','http://www.ditsolution.com.np/admin'); // url of our admin panel
	define('SITE_ADMIN_PATH',$_SERVER['DOCUMENT_ROOT']."/admin/"); //path of our admin panel
}

?>