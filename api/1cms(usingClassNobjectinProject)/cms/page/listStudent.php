<?php
   if (isset($_GET['mode']) == "D") {
    $std_id = $_GET['std_id'];
    $objDatabase->table = 'student';
    $objDatabase->cond = array('std_id' => $std_id);
    if ($objDatabase->delete()) {
        echo '<script language="javascript">
                window.location="index.php?page=listStudent";
            </script>';
    } else {
        echo "error while deleting";
    }
}
?>
                <table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
                    <tr>
                        <td colspan="8" align="right">
                            <a href="index.php?page=addStudent&mode=I">Add New Student</a> <!-- we gave I in mode for insert -->
                        </td>
                    </tr>
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>DOB</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php
                    $sql = "select * from student";
                    $objDatabase->query = $sql;
                    $result = $objDatabase->execute();
                    $sno = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $sno++ ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['age'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['dob'] ?></td>         
                            <td>
                                <?php 
                                    $status=$row['status']=='Y'?'Active':'In-Active';
                                    echo $status;
                                ?>
                            </td>         
                            <td>
                                <a href="index.php?page=addStudent&mode=U&std_id=<?php echo $row['std_id']?>">Edit</a>
                            </td>         
                            <td>
                                <a onclick="return confirm('Do you really want to delete ??')" href="index.php?page=listStudent&mode=D&std_id=<?php echo $row['std_id']?>">Delete</a>
                            </td>         
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            