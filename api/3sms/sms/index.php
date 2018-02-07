<?php 
session_start();
if($_SESSION['user_id']==""){
  header('location:login.php'); //when session is empty goto login page. 
}
include_once('includes/dbConnect.php');
$page=isset($_GET['page'])?$_GET['page']:'home';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Student Management System</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="">
        <div id="wrapper">
            <div id="header">
                <?php include_once('pageparts/header.php')?>
            </div>
            <div id="menu">
                <?php include_once('pageparts/menu.php')?>
            </div>
            <div id="content">
               <?php include_once("page/$page.php")?>
            </div>
            <br/>
            <div id="footer">
               <?php include_once('pageparts/footer.php')?>
            </div>
        </div>
    </body>
</html>
