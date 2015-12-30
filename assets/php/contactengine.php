<?php
/*
From http://www.html-form-guide.com 
This is the simplest emailer one can have in PHP.
If this does not work, then the PHP email configuration is bad!
*/
$msg="NOthing Happend!";
if(isset($_POST['email']))
{
    /* ****Important!****
    replace name@your-web-site.com below 
    with an email address that belongs to 
    the website where the script is uploaded.
    For example, if you are uploading this script to
    www.my-web-site.com, then an email like
    form@my-web-site.com is good.
    */
        $msg= "EMAIL IS VALID";
	$from_add = "bwisdom@wizbang-workspace.com"; 

	$to_add = "wizbangtheory@gmail.com,bwisdom@rightstuffequipment.com"; //<-- put your yahoo/gmail email address here

	$subject = "[NEWSLETTER] - A New Lead has signed up for the Dr. Pharm Newsletter!";
	$message = $_POST['email'];
	
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	
	
	if(mail($to_add,$subject,$message,$headers)) 
	{
		$msg = "Mail sent OK";
	} 
	else 
	{
 	   $msg = "Error sending email!";
	}
     print "<meta http-equiv=\"refresh\" content=\"0;URL=../../index.html\">"; 
}
?>