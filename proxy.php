<?php
// ini_set('error_log', '/virtual/calico/log/error.log') ;

//$IMAGE_DIR_PTH = '/var/www/html/mayuge/img/';
$IMAGE_DIR_PATH = './tmpimg/';

$filename = strtolower(basename($_FILES['imageSelector']['name']));
if (move_uploaded_file($_FILES['imageSelector']['tmp_name'], $IMAGE_DIR_PATH . $filename)) {
    $data = array('filename' => $filename);
} else {
    $data = array('error' => 'Failed to save');
}

//error_log($filename);
// error_log('test');

list($width, $height) = getimagesize($IMAGE_DIR_PATH . $filename);

// error_log($width.':'.$height);

// 縦横800px以内に縮小
$limitSize = 400;
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
	$image = new Image($IMAGE_DIR_PATH . $filename);
	$image->Resize($width, $height)->Save();
}



$postfields = array("image"=>"@".$IMAGE_DIR_PATH . $filename .";type=image/jpeg");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://detectface.com/api/detect");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
curl_exec($ch);

//var_dump(curl_exec($ch));
//error_log(print_r(curl_exec($ch))); // Webサーバのエラーログに記述す
curl_close ($ch);

unlink($IMAGE_DIR_PATH . $filename);