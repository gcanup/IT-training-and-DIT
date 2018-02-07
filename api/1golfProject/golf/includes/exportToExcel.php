<?php
include_once("Constants.php");
mysql_connect(HOST,USERNAME,PASSWORDD);
mysql_select_db(DATABASENAME);
if($_GET['data']=="adminuser")
{     
adminUserList('tbl_adminuser');
}


function adminUserList($tableName=null)
{	
	$line1 = "Username".",";
	$line1 .= "Password".",";
	$line1 .= "Fullname";
		
	$line2 = trim($line1)."\n";
	
	  $select = "SELECT  * FROM ".$tableName."  order by id desc"; 
      $recordStart       =      mysql_query($select);
	 while($row = mysql_fetch_array($recordStart)) {
				
			$value = "\"".$row['username']."\",";
			$value .= "\"".base64_decode($row['password'])."\",";
			$value .= "\"".$row['fullname']."\",";
			if(strlen(trim($value))>0)		
			$data .= trim($value)."\n";
	}
	
    $finalData = trim($line2.$data);
	
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=AdminUserList".date('Y-m-d').".csv");
	print $finalData; 
 } 
 
if($_GET['data']=="clientList")
{     
clientList('tbl_client');
}


function clientList($tableName=null)
{	
	$line1 = "Fistname".",";
	$line1 .= "LastName".",";
	$line1 .= "Email";
		
	$line2 = trim($line1)."\n";
	
	  $select = "SELECT  * FROM ".$tableName."  order by id desc"; 
      $recordStart       =      mysql_query($select);
	 while($row = mysql_fetch_array($recordStart)) {
				
			$value = "\"".$row['firstname']."\",";
			$value .= "\"".$row['lastname']."\",";
			$value .= "\"".$row['email']."\",";
			if(strlen(trim($value))>0)		
			$data .= trim($value)."\n";
	}
	
    $finalData = trim($line2.$data);
	
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=clientList".date('Y-m-d').".csv");
	print $finalData; 
 } 
 
 
 
 if($_GET['data']=="static")
{     
staticList('tbl_static');
}


function staticList($tableName=null)
{	
	$line1 = "Pagename".",";
	$line1 .= "PageTitle".",";
	$line1 .= "PageDescritpion";
		
	$line2 = trim($line1)."\n";
	
	  $select = "SELECT  * FROM ".$tableName."  order by id desc"; 
      $recordStart       =      mysql_query($select);
	 while($row = mysql_fetch_array($recordStart)) {
				
			$value = "\"".$row['pagename']."\",";
			$value .= "\"".$row['pagetitle']."\",";
			$value .= "\"".html_entity_decode( $row['pagedescription'])."\",";
			if(strlen(trim($value))>0)		
			$data .= trim($value)."\n";
	}
	
    $finalData = trim($line2.$data);
	
	header("Content-type: application/png");
	header("Content-Disposition: attachment; filename=staticPageList".date('Y-m-d').".png");
	print $finalData; 
 } 
 
 
 

 ?>