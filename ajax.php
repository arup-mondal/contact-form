<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['msg'])){

require 'vendor/autoload.php';
$mail = new PHPMailer(true);          

	try{
		$mail->SMTPDebug = false;                                 
	    $mail->isSMTP();                                      
	    $mail->Host = 'smtp.mailtrap.io';  
	    $mail->SMTPAuth = true;                              
	    $mail->Username = '43840f147f5073';                 
	    $mail->Password = 'af7e707bc56ed3';                           
	    $mail->Port = 465;                                    

	    $mail->setFrom('info@webdevelopmentsolutions.net', 'Admin');
	    $mail->AddReplyTo($_POST["email"], $_POST["name"]);
	    $mail->addAddress('support@webdevelopmentsolutions.net', 'Admin');   

	    $subject    = 'New Contact Request';
	    $body       = 'A new contact request has been received with the following details.<br/>';
	    $body       =  $body.'<b>Name:</b> '.$_POST["name"].'<br/>';
	    $body       =  $body.'<b>Email:</b> '.$_POST["email"].'<br/>';
	    $body       =  $body.'<b>Message:</b> '.$_POST["msg"].'<br/>'; 

	    $mail->isHTML(true);                                  
	    $mail->Subject = $subject;
	    $mail->Body    = $body;
	    $mail->send();
		echo json_encode(['status' => true,'message' => 'Thank you for your feedback!']);

	}catch(Exception $e){
		echo json_encode(['status' => false,'message' => 'Some error occured, please try again later']);
	}                   

}else{
	echo json_encode(['status' => false,'message' => 'Validation error!']);
}