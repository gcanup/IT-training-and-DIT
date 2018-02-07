<!doctype html>
<?php

error_reporting(E_ALL & ~E_NOTICE);

include_once ('includes/database.php');
$objdatabase= new database();
$objdatabase->table='applicants';
session_start();
$msg='';
        if($_SERVER['REQUEST_METHOD']=='POST'){
       
            
//            print_r($_SESSION);
//
//        exit();
            $resume_name = $_FILES['resume']['name'];            
            $tmp_path = $_FILES['resume']['tmp_name'];          
             $resume_size = $_FILES['resume']['size'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $address=$_POST['address'];
            $contact=$_POST['contact'];   
            $qualification=$_POST['qualification'];
            $experience=$_POST['experience'];
            $resume=$_POST['resume'];
            $job=$_POST['job'];
            $date=$_POST['date'];
            
//            echo $name.('<br />').$email.('<br />').$address.('<br />').$contact.('<br />').$qualification.('<br />').$experience.('<br />').$resume
//                    .('<br />').$job.('<br />').$date;
//            exit();
            
            $captcha_key=$_POST['captcha_key'];
            $isFormValid=true;
            
            if ($name==""){
                $isFormValid=false;
                $msg.='Name is empty'. ('<br />');
                
            }
            if ($captcha_key==""){
                $isFormValid=false;
                $msg.='Please enter security key'. ('<br />');
                
            }
           if ($captcha_key!=$_SESSION['security_code']){
               $isFormValid=false;
                $msg.='Invalid security key'. ('<br />');
           }
            echo $msg. ('<br />');
                $resume_name=$name.'-'.$resume_name;           //this name again 
                $resumeFolderPath = RESUME_PATH . $resume_name;
            
            if ($isFormValid==true){
                
            if ($resume_name!="") {
            if (!move_uploaded_file($tmp_path, $resumeFolderPath)) {  //this section
                echo "Failed to upload CV";
                exit;
            }
        }
                $objdatabase->data=array("fullname"=>$name, "email"=>$email, "address"=>$address, "contact"=>$contact, "qualification"=>$qualification,
                    "experience"=>$experience,"resume"=>$resume_name, "job"=>$job ,"date"=>$date,);
                   
                $success=$objdatabase->insert();
            
//                 $objdatabase->show_query();
//                    exit;
                if($success==true){
                    echo 'data inserted successfully';
                    echo '<script language="javascript">
                window.location="index.php";
            </script>';
                } else {
                    
                    $msg.= "Error while inserting";
                }
            }
                        
        }
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<title>Application Form</title>
</head>

<body>

<header>
<div class="container">
<h1>Applicants information</h1>
</div>
</header>

    <div class="container">
      <div id="signup">
                    
          <form action="" method="post" id="feedbackform" enctype="multipart/form-data">
                        	
                            <div class="suMain">
                            	<div class="suColL">Fullname:</div>
                                <div class="suColR"><input name="name" type="text" class="suInpTxt" /></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            
                            <div class="suMain">
                            	<div class="suColL">Email:</div>
                                <div class="suColR"><input name="email" type="email" class="suInpTxt" /></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            
                            <div class="suMain">
                            	<div class="suColL">Address:</div>
                                <div class="suColR"><input name="address" type="text" class="suInpTxt" /><br /><span class="suLightTxt">A confirmation will be sent to this email address</span></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            
                            
                                <div class="suMain">
                            	<div class="suColL"> Phone No:</div>
                                <div class="suColR"><input name="contact" type="text" class="suInpTxt" /></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            

                            

                            
                            <div class="suMain">
                            	<div class="suColL">Qualification</div>
                                <div class="suColR"><input name="qualification" placeholder="Educational Qualification" type="text" class="suInpTxt" /></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            
                            <div class="suMain">
                            	<div class="suColL">Experience</div>
                                <div class="suColR">
                                    <textarea name="experience" placeholder="Working experience" rows="4" cols="50"> </textarea></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            

                                                       
                            
                          <div class="suMain">
                            	<div class="suColL">Resume</div>
                                <div class="suColR"><input name="resume"  type="file" class="suInpTxt" /></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                                                        
                          <div class="suMain">
                            	<div class="suColL">Preferred Job</div>
                                <div class="suColR"><input name="job" type="text" placeholder="preferred job field" class="suInpTxt" /></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            
                          <div class="suMain">
                            	<div class="suColL">Date</div>
                                <div class="suColR"><input name="date" type="date" class="suInpTxt" /></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            
                            <div class="suMain">
                            	<div class="suColL"></div>
                                <div class="suColR">
                                   <img src=" <?php echo SITE_FRONT_URL?>includes/CaptchaSecurityImages.php?height=30&width=150&characters=5"/>
                                </div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            
                          <div class="suMain">
                            	<div class="suColL">Enter Security Key</div>
                                <div class="suColR"><input name="captcha_key" type="text" class="suInpTxt"  /></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            
                            <div class="suMain">
                            	<div class="suColL">&nbsp;</div>
                                <div class="suColR"><input name="" type="image" src="images/but-submit.gif" /></div>
                                <div class="clearfloat"></div>
                            </div><!-- end of class suMain -->
                            
                        </form>
                    
                    </div>
    </div>  <!-- container ends
<!--<footer>  

<p class="text-center"> Copyright 2017 &copy; All rights reserved. </p>
 </footer>-->


 </body>
</html>