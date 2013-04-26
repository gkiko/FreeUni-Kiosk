<?php
	
	$name = $_GET['name'];
	$surname = $_GET['surname'];
	$mail = $_GET['mail'];
	
	$mda;
	
	if($_GET['olimp'] == 'lav'){
		$mda = '\"ლავუაზიეს წრე\"';
	}else if($_GET['olimp'] == 'edi'){
		$mda = '\"ედისონის ლიგა\"';
	}
	
// -------------------
	require_once($_SERVER['DOCUMENT_ROOT'].'/FreeUni/class.phpmailer.php');	
	$output;	
	$mail  = new PHPMailer();   
	$mail->IsSMTP();
	//GMAIL config
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the server
	$mail->Host       = "smtp.gmail.com:465";      // sets GMAIL as the SMTP server    // set the SMTP port for the GMAIL server
	$mail->Username   = "XXX@gmail.com";  // GMAIL username
	$mail->Password   = "XXX";            // GMAIL password
	//End Gmail

	$mail->From       = "XXX@gmail.com";
	$mail->FromName   = "Free University";
	$mail->Subject    = "Opaaa !";
	$mail->MsgHTML("მოგესალმებით ".$_GET['name'].", <br><br>თქვენ წარმატებით დარეგისტრირდით აგრარული უნივერსიტეტის კონკურსზე ".$mda." როგორც \"".$_GET['group']."\"-ის წევრი <br><br>
						კონკურსში მონაწილეობისათვიs დასამთავრებელია");
	$mail->ContentType = 'text/html';
	$mail->CharSet = 'UTF-8';
	$mail->AddReplyTo("XXX@gmail.com","Free University");//they answer here, optional
	$mail->AddAddress($_GET['mail'],"name to");
	$mail->IsHTML(true); // send as HTML
	
	if(!$mail->Send()) {//to see if we return a message or a value bolean
		$output = "მეილი არ გაიგზავნა";
	} else{
		$output = "მეილი წარმატებით გაიგზავნა";	
	}
// ------------------------
?>