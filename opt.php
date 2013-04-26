<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>registration</title>
		<meta name="description" content="" />
		<meta name="author" content="Zviad Sulaberidze" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />

		<link rel="stylesheet" type="text/css" href="opts.css" />
	</head>

	<body>
		<form action="collect.php" method="POST">
			<input type="hidden" name="fname" value="<?php echo $_POST['fname']?>"/>
			<input type="hidden" name="lname" value="<?php echo $_POST['lname'] ?>"/>
			<input type="hidden" name="email" value="<?php echo $_POST['email'] ?>"/>
			<input type="hidden" name="phone" value="<?php echo $_POST['phone'] ?>"/>
    <div class="caption">
    	სიახლეების გამოწერა
    </div>
    <div class="optblock">
    <input class="opts" type="checkbox" name="sub" value="sub_news"/> შეიტყვე სიახლეები თავისუფალი და აგრარული უნივერსიტეტების შესახებ ელფოსტით<br />
	</div>
	
    <div class="caption">
    	გაცნობითი პროგრამები
    </div>
       <div class="optblock">
       		<input class="opts" type="checkbox" name="esm" value="gac_ESM" /> ბიზნესის ადმინისტრირება (ESM)<br />
			<input class="opts" type="checkbox" name="aaf" value="gac_AAF"/> საერთაშორისო ურთიერთობები (აზიისა და აფრიკის ინსტიტუტი)<br />
			<input class="opts" type="checkbox" name="law" value="gac_LAW"/> სამართალი<br />
			<input class="opts" type="checkbox" name="mac" value="gac_MACS"/> მათემატიკა და კომპიუტერული მეცნიერებები (MACS)<br />
			<input class="opts" type="checkbox" name="phy" value="gac_PHY"/> ფიზიკა<br />
			<input class="opts" type="checkbox" name="mar" value="gac_MAR"/> მართვა და საზოგადოებრივი მეცნიერებები<br />
			<input class="opts" type="checkbox" name="agr" value="gac_AGR"/> აგრარული და საბუნებისმეტყველო მეცნიერებები<br />
			<input class="opts" type="checkbox" name="eng" value="gac_ENG"/> საინჟინრო ტექნოლოგიური<br />
		</div>

   <div class="caption">
    	უნივერსიტეტის ოლიმპიადები
    </div>
    <div class="optblock">
		<input class="opts" type="checkbox" name="tech" value="olp_TEC"/> ტექნიკური და საინჟინრო<br />
		<input class="opts" type="checkbox" name="hum" value="olp_HUM"/> ჰუმანიტარული<br />
		<input class="opts" type="checkbox" name="nat" value="olp_NAT"/> საბუნებისმეტყველო<br />
	</div>	
			
			<input type="submit" value="დარეგისტრირდი" />

		</form>
		
		<script>
			
			fuction highlight(aidi) {
				
				document.getElementbyID(aidi).style.background-color="yellow"
			}
		</script>
	</body>
</html>