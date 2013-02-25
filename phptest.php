<?php

//echo "hello";


/**** エラーログを記録 ****/
// $logdate = date('Ymd') ;
// // $logpath = realpath(dirname((__FILE__ ))).'/../../../errorlog' ;
// $logpath = '/var/log/' ;
// $logfile = "$logpath/'phperror'.$logdate.log" ;
// ini_set('error_log', $logfile) ;

$filename = strtolower(basename($_FILES['imageSelector']['name']));
if (move_uploaded_file($_FILES['imageSelector']['tmp_name'], '/var/www/html/mayuge/img/' . $filename)) {
    $data = array('filename' => $filename);
} else {
    $data = array('error' => 'Failed to save');
}

// error_log($filename);
// error_log('test');

list($width, $height) = getimagesize('/var/www/html/mayuge/img/' . $filename);

// error_log($width.':'.$height);

// 縦横800px以内に縮小
$limitSize = 800;
if ($width > $limitSize || $height > $limitSize) {

	if ($width > $height) {
		$height = round($height * $limitSize / $width);
		$width = $limitSize;
	} elseif ($width < $height) {
		$width = round($width * $limitSize / $height);
		$height = $limitSize;
	} else {
		$width = $limitSize;
		$height = $limitSize;
	}

	include ('image.php');
	$image = new Image('/var/www/html/mayuge/img/' . $filename);
	$image->Resize($width, $height)->Save();
}



$postfields = array("image"=>"@/var/www/html/mayuge/img/" . $filename .";type=image/jpeg");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://detectface.com/api/detect");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
curl_exec($ch);

//var_dump(curl_exec($ch));
//error_log(print_r(curl_exec($ch))); // Webサーバのエラーログに記述す
curl_close ($ch);