<?php
include_once("class.phpmailer.php");
include_once("functions.php");
$objFunction = new Functions;

/**
 * REDIRECTS TO ANOTHER PAGE
 * */
function redirect($url) {
    if (headers_sent()) {
        echo "<script language=\"Javascript\">window.location.href='$url';</script>";
        exit;
    } else {
        session_write_close();
        header("Location:$url");
        exits;
    }
}
/**
 * CHECK FIELD
 * */
function check($field) {
    $field = strip_tags($field);
    $field = trim($field);
    $field = stripslashes($field);
    $field = mysql_real_escape_string($field);
    return $field;
}

/**
 * Email function
 * @param string $fromName	
 * @param string $fromEmail	
 * @param string $receiverEmail	
 * @param string $subject	
 * @param string $content	
 * @param string $replyName	
 * @param boolean $debug	
 * @return 1 or null
 */
function sendEmail($fromName, $fromEmail, $receiverEmail, $subject, $content, $replyTo="", $debug=false) {

    $sendMail = new PHPMailer();
    $sendMail->FromName = $fromName;
    $sendMail->From = $fromEmail;
    $sendMail->AddAddress($receiverEmail);
    if (trim($replyTo) != "")
        $sendMail->AddReplyTo($replyTo);
    $sendMail->IsHtml(true);
    $sendMail->Subject = $subject;
    $sendMail->Body = html_entity_decode($content);
    if ($debug)
        die(html_entity_decode($content));
    else
        return $sendMail->Send();
}

// To find the extension of the given $filename
function getExtension($fileName) {
    $ext = explode(".", $fileName);
    $fileExt = $ext[sizeof($ext) - 1];
    return $fileExt;
}

function showPre($arr) {
    $dis = sprintf("<div id='show' style='border:1px solid green;color:green;background:#99CCCC;font-weight:bold'><pre>");
    echo $dis;
    print_r($arr);
    echo "</pre></div>";
}

?>