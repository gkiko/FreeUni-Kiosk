<?php
	
	require_once('/class.phpmailer.php');
	
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
	
	$mail->From       = "competition@agruni.edu.ge";
	$mail->FromName   = "Agruni Competitions";
	$mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/Kiosk2/individualuri.txt');
	$mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/Kiosk2/lavuaziis.txt');
	$mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/Kiosk2/edisonis.txt');
	$mail->Subject    = "Registered Students Files";
	$mail->MsgHTML("დარეგისტრირებული მოსწავლეები");
	
	$mail->AddReplyTo("competitions@agruni.edu.ge","Agruni Competition");//they answer here, optional
	$mail->AddAddress("a.kvanchilasvili@agruni.edu.ge","Free University of Tbilisi");
	$mail->IsHTML(true); // send as HTML
	
	if(!$mail->Send()) {//to see if we return a message or a value bolean
		$output = "მეილი არ გაიგზავნა";
	} else{
		$output = "მეილი წარმატებით გაიგზავნა";	
	}  
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Response</title>
		<meta name="description" content="" />
		<meta name="author" content="Zviad Sulaberidze" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />

		<link rel="stylesheet" type="text/css" href="first_page.css" />
		<style>
			body {
				font: 1em/1.5 BPG Rioni, Verdana, Sans-Serif;
				background: #eee;
				background-image: url('bg.jpg');
			}		
			H1 {
				position: fixed;
				top: 50%;
				margin-top: -18px;
				text-align: center;
				font-size: 45px;
			}
		
			div {
				width: 300px;
			    height: 360px;
			    position: absolute;
			    top:0;
			    bottom: 0;
			    left: 0;
			    right: 300px;
			    margin: auto;
			}
		</style>
	</head>

	<body>
		<div>
			<h1><?php echo $output; ?></h1>
		</div>
	</body>
</html>