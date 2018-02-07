<?php

class CaptchaSecurityImages {
    var $font='MONOFONT.TTF';
    function generateCode($characters) {
        $possible='23456789bcdefghijklmnopqrstuvwxyz';
        $code="";
        $i=0;
        while ($i<$characters){
            $code.=substr($possible,mt_rand(0,  strlen($possible)-1),1);
            $i++;
        }
        return $code;
    }
    
    function CaptchaSecurityImages($width='120',$height='40', $characters='6'){
        $code=$this->generateCode($characters);
        $font_size=$height*0.65;
        $image=@imagecreate($width, $height)or die ('cannot initialize new image');
        $background_color=  imagecolorallocate($image, 255, 255, 255);
        $text_color=  imagecolorallocate($image, 138, 19, 119);
        $noise_color=  imagecolorallocate($image, 115, 163, 135);
        
                for($i=0; $i<($width*$height)/3;$i++) {
                imagefilledellipse($image,mt_rand(0,$width), mt_rand(0,$height),1,1, $noise_color); }
        
        for($i=0; $i<($width*$height)/150;$i++) {
            imageline($image,mt_rand(0,$width), mt_rand(0,$height), mt_rand(0, $width), mt_rand(0, $height), $noise_color);
            
        }
        $textbox= imagettfbbox($font_size,0,$this->font, $code) or die('Error in imagettfbbox function');
        $x=($width-$textbox[4])/2;
    
         $y=($height-$textbox[5])/2;
         imagettftext($image,$font_size,0,$x,$y,$text_color,$this->font,$code) or die ('Error in imagettftext function');
         
         header('Content-Type: image/jpeg');
         imagejpeg($image);
         imagedestroy($image);
         
         session_start();
         $_SESSION['security_code']=$code;
}
}
    $width=isset($_GET['width'])?$_GET['width']:'120';
        $height=isset($_GET['height'])?$_GET['height']:'40';
            $characters=isset($_GET['characters'])&&$_GET['characters']>1?$_GET['characters']:'6';
            
            $captcha=new CaptchaSecurityImages($width, $height, $characters);

?>