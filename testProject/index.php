<!DOCTYPE html>

<?php

error_reporting(E_ALL & ~E_NOTICE);//To show all error except Notic error which distrub us
$con = mysqli_connect("localhost", "root",'', "signup");
if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM users"; // where $sql is variable and user is table name .
$result = $con->query($sql);
$msg="";
$mode=$_GET['mode'];
$id=isset($_GET['id'])?$_GET['id']:'';
if($mode=='U'){
$sql = "select * from users where id='$id'";
$result = $con->query($sql);
$row = mysqli_fetch_assoc($result);
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $id = $_POST['id'];
    $mode = $_POST['mode'];
    
$isFormValid = true;
if ($name == "") {
$isFormValid = false;
$msg.="Name is Empty !!<br/>";
}
if ($email == "") {
$isFormValid = false;
$msg.="Email is Empty !!<br/>";
}
if ($phone == "") {
$isFormValid = false;
$msg.="Phone number is Empty !!<br/>";
}
if ($isFormValid == true) {
if($mode=='I'){ // if there I in mode then insert other wise update.
    $sql = "insert into users(name,
email,phone) values('$name', '$email', '$phone')";
   
    
}elseif($mode=='U'){
 $sql="update users set name='$name', email='$email', phone='$phone'where id='$id'";
}
}
}
// TO load data to the form.

?>

<html>
<head>

</head>
<body>

<h1>Nord Software</h1>
<h2>List of Participants </h2>
<form action="" method="post" onsubmit="returnvalidateForm(this)">
    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
    <input type="hidden" name="mode"  value="<?php echo $mode?>"/> <!--to send mode by hidden
to show it we use fire bug.-->
    <table width="80%">
        <tr>
            <td><input type="text"  placeholder="Full name" name="name" id="name" autofocus required> </td>
            <td><input type="email" value="E-mail address" name="email" id="email" autofocus required></td>
            <td><input type="text" value="Phone number" name="phone" id="phone"autofocus required></td>
            <td width="25%"><button type="submit" name="save">Add new</button></td>
        </tr>
    </table>
</form>


    
<br>
<br>

    <table width="80%">
    <tr>
    <th width="20%">S.No.</th>
    <th width="20%">Full Name</th>
    <th width="20%">E-mail address</th>
    <th width="20%">Phone Number</th>
    <th colspan="2" width="20%">Action</th>
    </tr>
    <?php
$sno = 1;
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $sno++ ?></td>
<td><?php echo $row['name'] ?></td>
<td><?php echo $row['email'] ?></td>
<td><?php echo $row['phone'] ?></td>
<td><a href="index.php?mode=U&id=<?php echo
$row['id']?>">Edit</a></td>
<td><a onclick="return confirm('Do you really want to delete ??')"
href="index.php?mode=D&id=<?php echo $row['id']?>">Delete</a></td>


    </tr>
   <?php } ?>
    </table>
   
</body>
</html>
