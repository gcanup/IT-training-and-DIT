<?php
if (isset($_GET['mode']) == "D") {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $galleryFolderPath = GALLERY_PATH . $name;
    @unlink($galleryFolderPath);
    $objDatabase->table='image';
    $objDatabase->cond=array('id'=>$id);
    if($objDatabase->delete()){
        echo '<script language="javascript">
                window.location="index.php?page=listgallery";
            </script>';
    }else{
      echo "error while deleting";  
    }
}
?>

<table width="98%" align="center" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td colspan="8" align="right">
            <a href="index.php?page=addGallery&mode=I">Add New Image</a>
        </td>
    </tr>
    <tr>
        <th>S.No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Status</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
    $sno = 1;
    $sql = "select * from image where 1=1";
    $objDatabase->query=$sql;
    $result = $objDatabase->execute();
    while ($row = $objDatabase->fetch_array()) {
        ?>
        <tr>
            <td><?php echo $sno++ ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phone'] ?></td>  
            <td>
            <img src="<?php echo GALLERY_URL.$row['image']?>" width="100" height="80"/>
            <?php echo $row['image'] ?>
            </td>
                   
            <td>
                <?php
                $status = $row['status'] == 'Y' ? 'Active' : 'In-Active';
                echo $status;
                ?>
            </td>         
            <td>
                <a href="index.php?page=addGallery&mode=U&id=<?php echo $row['id'] ?>">Edit</a>
            </td>         
            <td>
                <a onclick="return confirm('Do you really want to delete ??')" href="index.php?page=listGallery&mode=D&id=<?php echo $row['id'] ?>&image=<?php echo $row['image'] ?>">Delete</a>
            </td>         
        </tr>
        <?php
    }
    ?>
</table>
