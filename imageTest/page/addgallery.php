<?php
$objDatabase->table='image';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    // echo "<pre>";
    //print_r($_FILES['image_name']);exit;
    $image = $_FILES['image']['name'];
    $tmp_path = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $old_image = $_POST['old_image'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    $mode = $_POST['mode'];
    $isFormValid = true;
    $success=false;
    $msg = "";
    if ($name == "") {
        $isFormValid = false;
        $msg.="name is Empty !!<br/>";
    }
    if ($image == "") {
        $isFormValid = false;
        $msg.="Image is Empty !!<br/>";
    }

    
//   Escaping quotes 
//     $str='This is ram \'s book';
//    $str="This is ram's book";
//    
//    $table="<table width=\"100%\"></table>";
//    $table='<table width="100%"></table>';
    $image='img_'.date('Ymd').rand(99999,99999999).$image;
    $galleryFolderPath = GALLERY_PATH . $image;
    if ($isFormValid == true) {
        if ($image!="") {
            if (!move_uploaded_file($tmp_path, $galleryFolderPath)) {
                echo "Failed to upload image";
                exit;
            }
        }
        $objDatabase->data=array("name"=>$name,
                                 "email"=>$email,
                                 "phone"=>$phone,
                                 "image"=>$image,
                                 "status"=>$status
                                );
        if ($mode == 'I') {            
           $success=$objDatabase->insert(); 
        } else {
            if ($image=="") {
                $galleryFolderPath = GALLERY_PATH . $old_image;
                @unlink($galleryFolderPath);
            } else {
                $image = $old_image;
            }
           $objDatabase->cond=array('id'=>$id); 
           $success=$objDatabase->update();
        }
        if($success==true){
          echo '<script language="javascript">
                window.location="index.php?page=listgallery";
            </script>';
        }else{
            $msg = "Error While Inserting";
        }
        
    }
}
$mode = $_GET['mode'];
$id = isset($_GET['id'])? $_GET['id'] : '';
if ($mode == 'U') {
    $sql = "select * from image where id='$id'";
    $objDatabase->query = $sql;
    $result = $objDatabase->execute();
    $row = mysqli_fetch_assoc($result);
}
?>
<form name="std_reg" id="std_reg" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
    <input type="hidden" name="mode" value="<?php echo $mode ?>"/>
    <table width="80%" border="0">
        <tr>
            <td colspan="2" align="right">
                <a href="index.php?page=listGallery">Back</a>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="err_msg">
                    <?php
                    echo $msg;
                    ?> 
                </div>
            </td>  
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" value="<?php echo $row['name'] ?>" name="name" id="name" size="40" /></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="image" id="image" value="<?php echo $row['image'] ?>" size="40"/></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" value="<?php echo $row['phone'] ?>" name="phone" id="phone" size="40" maxlength="200"/></td>
        </tr>
         <tr>
            <td>Email</td>
            <td>
                <textarea rows="5" cols="50" name="email" id="email"><?php echo $row['email'] ?></textarea>
            </td>
        </tr>
        <?php
        if ($row['image'] != "") {
            ?>
            <tr>
                <td width="20%" height="30" >Existing Image : &nbsp;</td>
                <td>&nbsp;<img src="<?php echo GALLERY_URL . $row['image'] ?>" height="150" width="150" />
                    <input type="hidden" name="old_image" value="<?php echo $row['image'] ?>" />
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td>Status</td>
            <td>
                <input type="radio" name="status" id="status" value="Y" <?php if ($row['status'] == 'Y') {
                        echo 'checked="checked"';
                    } ?>/>Active
                <input type="radio" name="status" id="status1" value="N" <?php if ($row['status'] == 'N') {
                        echo 'checked="checked"';
                    } ?>/>In-Active
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" id="submit" value="Save"/>&nbsp;&nbsp;&nbsp;
                <input type="reset" name="reset" id="reset" value="Clear"/>
            </td>
        </tr>
    </table>
</form>
