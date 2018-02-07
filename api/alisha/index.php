
<?php

error_reporting(E_ALL & ~E_NOTICE);
include_once ('includes/database.php');
$objdatabase= new database();
$objdatabase->table='applicants';
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<header>
<div class="container">
<h1>Applicants information</h1>
</div>
</header>

<body>
   
        <table class="table table-striped" width="98%" align="center" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td colspan="10" align="right">
            <a href="add.php">Add New Application</a>
        </td>
    </tr>
    <tr>
        <th>S.No.</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Address</th>
        <th>Contact Date</th>
        <th>Qualification</th>
        <th>Experience</th>
        <th>Resume</th>
        <th>Job</th>
        <th>Date</th>
    </tr>
    <?php
    $sno = 1;
    $sql = "select * from applicants where 1=1";
    $objdatabase->query=$sql;
    $result = $objdatabase->execute();
    while ($row = $objdatabase->fetch_array()) {
        ?>

        <tr>
            <td><?php echo $sno++ ?></td>
           
            <td><?php echo $row['fullname'] ?></td>
            <td>
                
            <?php echo $row['email'] ?>
            </td>
            <td><?php echo $row['address'] ?></td>         
            <td>
                <?php echo $row['contact'] ?>
            </td>   
                        <td>
                <?php echo $row['qualification'] ?>
            </td> 
                        <td>
                <?php echo $row['experience'] ?>
            </td> 
                        <td>
                <?php echo $row['resume'] ?>
            </td> 
                        <td>
                <?php echo $row['job'] ?>
            </td> 
                        <td>
                <?php echo $row['date'] ?>
            </td> 
         
        </tr>
        <?php
    }
    ?>
</table>
  

</body>
