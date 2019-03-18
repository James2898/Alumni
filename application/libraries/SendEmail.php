<?php 
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	class SendEmail {
		
		public function __construct(){
	        log_message('Debug', 'PHPMailer class is loaded.');
	    }

	    public function load(){

			require APPPATH.'PHPMailer/src/Exception.php';
			require APPPATH.'PHPMailer/src/PHPMailer.php';
			require APPPATH.'PHPMailer/src/SMTP.php';

	        $mail = new PHPMailer;
	        return $mail;
	    }

	    public function do_send($subject = '', $body = '', $address = ''){
			require APPPATH.'PHPMailer/src/Exception.php';
			require APPPATH.'PHPMailer/src/PHPMailer.php';
			require APPPATH.'PHPMailer/src/SMTP.php';

	        $mail = new PHPMailer;
			//$this->load->library("sendemail");
	        //$mail = $this->sendemail->load();
	        $mail->IsSMTP(); // enable SMTP

		    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		    $mail->SMTPAuth = true; // authentication enabled
		    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		    $mail->Host = "smtp.gmail.com";
		    $mail->Port = 465; // or 587
		    $mail->IsHTML(true);
		    $mail->Username = "amajamesmartinez@gmail.com";
		    $mail->Password = "amajamesmartinez2898";
		    $mail->SetFrom("no-reply@howcode.com");
		    $mail->Subject = $subject;
		    $mail->Body = $body;
		    $mail->AddAddress($address);
		    
		     if(!$mail->Send()) {
		        $_SESSION['error_log'] = "Mailer Error: " . $mail->ErrorInfo;
		        $_SESSION['flashdata'] = "ERROR";
		     } else {
		        $_SESSION['flashdata'] = "Data Added";
		     }
		}

		
	}

?>