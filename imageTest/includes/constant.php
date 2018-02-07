<?php
if($_SERVER['HTTP_HOST']=='localhost'){
	define('HOST','localhost');
	define('USERNAME','root');
	define('PASSWORD','');
	define('DATABASE_NAME','signup');
	define('SITE_URL','http://localhost/imageTest/'); // url of our site
	define('SITE_PATH',$_SERVER['DOCUMENT_ROOT']."/imageTest/"); // path of our site
	//define('SITE_ADMIN_URL','http://localhost/cms/admin/'); // url of our admin panel
	//define('SITE_ADMIN_PATH',$_SERVER['DOCUMENT_ROOT']."/cms/admin/"); //path of our admin panel
        define('GALLERY_PATH',$_SERVER['DOCUMENT_ROOT']."/imageTest/gallery/"); //path of our gallery
	define('GALLERY_URL',SITE_URL."/gallery/"); //url of our gallery


}else{
	/*define('HOST','www.hello.com');
	define('USERNAME','root');
	define('PASSWORD','');
	define('DATABASE_NAME','my_db');
	define('SITE_URL','http://www.hello.com/'); // url of our site
	define('SITE_PATH',$_SERVER['DOCUMENT_ROOT']."/"); // path of our site
	define('SITE_ADMIN_URL','http://www.hello.com/'); // url of our admin panel
	define('SITE_ADMIN_PATH',$_SERVER['DOCUMENT_ROOT']."/admin/"); //path of our admin panel */
}
?>
