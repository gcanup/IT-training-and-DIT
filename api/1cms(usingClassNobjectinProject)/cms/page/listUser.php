<?php
$con = mysqli_connect("localhost", "root",'', "my_db");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "select * from admin_user"; // where $sql is variable and student is table name .
$result = $con->query($sql);
if(isset($_GET['mode'])=="D"){
   $user_id=$_GET['user_id'];
   $sql="delete from admin_user where user_id='$user_id'";
   if($con->query($sql)){
       echo "successfully deleted";
       echo '<script language="javascript">
                window.location="index.php?page=listUser";
            </script>';
   }else{
       echo "error while deleting";
   }
}
?>
         <table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td colspan="8" align="right">
            <a href="index.php?page=addUser&mode=I">Add New Admin User</a>
        </td>
    </tr>
    <tr>
        <th>S.No.</th>
        <th>User Name</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Status</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
    $sno = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $sno++ ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['email'] ?></td>      
            <td>
                <?php
                $status = $row['status'] == 'Y' ? 'Active' : 'In-Active';
                echo $status;
                ?>
            </td>         
            <td>
                <a href="index.php?page=addUser&mode=U&user_id=<?php echo $row['user_id'] ?>">Edit</a>
            </td>         
            <td>
                <a onclick="return confirm('Do you really want to delete ??')" href="index.php?page=listUser&mode=D&user_id=<?php echo $row['user_id'] ?>">Delete</a>
            </td>         
        </tr>
        <?php
    }
    ?>
</table>