<?php
	$mailText = "თქვენ წარმატებით გაიარეთ რეგისტრაცია !!!"."<br>";
	$gac = 1;
	$olp = 1;
	
	$endData = "------------------------"."\n"."\n\r";
	
	$stringData = "";
	foreach ($_POST as $key) {
		echo $key;
		$stringData = $stringData.$key."\n";
		if(substr($key, 0, 4) == 'gac_' && (strlen($key) == 7 || strlen($key) == 8)){
			if($gac == 1){
				$mailText .= "<br>";
				$mailText .= "თქვენ დარეგისტრირდით გაცნობით პროგრამებზე:"."<br><br>";
				$gac = 0;
			}
			if($key == 'gac_ESM'){
				echo "opa";
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ბიზნესის ადმინისტრირება (ESM). <br>';
			}else if($key == 'gac_AAF'){
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; საერთაშორისო ურთიერთობები (აზიისა და აფრიკის ინსტიტუტი). <br>';
			}else if($key == 'gac_LAW'){
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; სამართალი <br>';
			}else if($key == 'gac_MACS'){
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; მათემატიკა და კომპიუტერული მეცნიერებები (MACS). <br>';
			}else if($key == 'gac_PHY'){
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ფიზიკა <br>';
			}else if($key == 'gac_MAR'){
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; მართვა და საზოგადოებრივი მეცნიერებები . <br>';
			}else if($key == 'gac_AGR'){
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; აგრარული და საბუნებისმეტყველო მეცნიერებები . <br>';
			}else if($key == 'gac_ENG'){
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; საინჟინრო ტექნოლოგიური. <br>';
			}
		}else if(substr($key, 0, 4) == 'olp_' && (strlen($key) == 7 || strlen($key) == 8)){
			if($olp == 1){
				$mailText .= "<br>";
				$mailText .= "თქვენ დარეგისტრირდით უნივერსიტეტის ოლიმპიადაზე:"."<br><br>";
				$olp = 0;
			}
			if($key == 'olp_TEC'){
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ტექნიკური და საინჟინრო.  <br>';
			}else if($key == 'olp_HUM'){
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ჰუმანიტარული . <br>';
			}else if($key == 'olp_NAT'){
				$mailText .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; საბუნებისმეტყველო . <br>';
			}
		}
	}
	$stringData = $stringData.$endData;
	
	$myFile = "individualuri.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	fwrite($fh, $stringData);
	fclose($fh);
	
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
	
	$mail->ContentType = 'text/html';
	$mail->CharSet = 'UTF-8';
	$mail->From       = "competition@agruni.edu.ge";
	$mail->FromName   = "Agruni Competitions";
	$mail->Subject    = "Registration Confirmed !";
	$mail->MsgHTML($mailText);	
	$mail->AddReplyTo("a.kvanchilasvili@agruni.edu.ge","Agruni Competitions");//they answer here, optional
	$mail->AddAddress($_POST['email'],"name to");
	$mail->IsHTML(true); // send as HTML
	
	if(!$mail->Send()) {//to see if we return a message or a value bolean
		$output = "მეილი არ გაიგზავნა";
	} else{
		$output = "მეილი წარმატებით გაიგზავნა";	
	}
	// ------------------------
	
	header( "refresh:0;url=thank.html" );
?>