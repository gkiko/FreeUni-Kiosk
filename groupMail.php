<?php
	
	$name = $_GET['name'];
	$surname = $_GET['surname'];
	$mail = $_GET['mail'];
	
	$mda;
	
	if($_GET['olimp'] == 'lav'){
		$mda = '"ლავუაზიეს წრე"';
	}else if($_GET['olimp'] == 'edi'){
		$mda = '"ედისონის ლიგა"';
	}
	
// -------------------
	require_once('class.phpmailer.php');	
	$output;	
	$mail  = new PHPMailer();   
	$mail->IsSMTP();
	//GMAIL config
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the server
	$mail->Host       = "smtp.gmail.com:465";      // sets GMAIL as the SMTP server    // set the SMTP port for the GMAIL server
	$mail->Username   = "competition@agruni.edu.ge";  // GMAIL username
	$mail->Password   = "<P4q>5Eq";            // GMAIL password
	//End Gmail

	$mail->From       = "competitions@agruni.edu.ge";
	$mail->FromName   = "Agruni Competitions";
	$mail->Subject    = "Registration Confirmed!";
	$mail->MsgHTML("მოგესალმებით ".$_GET['name'].", <br><br>თქვენ წარმატებით დარეგისტრირდით აგრარული უნივერსიტეტის კონკურსზე ".$mda." როგორც \"".$_GET['group']."\"-ის წევრი <br><br>
						კონკურსში მონაწილეობის დეტალებზე უახლოეს ხანში დაგიკავშირდებით.<br><br><br> 
						mogesalmebiT ".$_GET['name'].", <br><br>Tqven warmatebiT daregistrirdiT agraruli universitetis konkursze ".$mda." rogorc \"".$_GET['group']."\"-is wevri <br><br>
						konkursSi monawileobis detalebze uaxloes xanSi dagikavSirdebiT.");
	$mail->ContentType = 'text/html';
	$mail->CharSet = 'UTF-8';
	$mail->AddReplyTo("a.kvanchilasvili@agruni.edu.ge","Agruni Competitions");//they answer here, optional
	$mail->AddAddress($_GET['mail'],"name to");
	$mail->IsHTML(true); // send as HTML
	
	if(!$mail->Send()) {//to see if we return a message or a value bolean
		$output = "მეილი არ გაიგზავნა";
	} else{
		$output = "მეილი წარმატებით გაიგზავნა";	
	}
// ------------------------
?>