<?php
	$endData = "------------------------"."\n"."\n\r";
	
	$olimpType = 2;
	$stringData = "";
	foreach ($_POST as $key) {
		if($olimpType == 2){
			if(substr($key,0,3) == 'lav'){
				$olimpType = 0;
			}else if(substr($key,0,3) == 'edi'){
				$olimpType = 1;
			}
		}
		$stringData = $stringData.substr($key,3)."\n";
	}
	$stringData = $stringData.$endData;
	
	echo $olimpType;
	$myFile;
	if($olimpType == 1){
		$myFile = "edisonis.txt";
	}else if($olimpType == 0){
		$myFile = "lavuaziis.txt";
	}
	
	$fh = fopen($myFile, 'a') or die("can't open file");
	fwrite($fh, $stringData);
	fclose($fh);
	
	header( "refresh:0;url=thank.html" );
?>