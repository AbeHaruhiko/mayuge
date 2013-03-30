<?php
require_once('config.php');

ini_set('error_log', '/virtual/calico/log/error.log') ;

if ($_FILES['imageSelector']['error'] != UPLOAD_ERR_OK) {
    error_log("エラーが発生しました : ".$_FILES['imageSelector']['error']);
    exit;
}

$size = $_FILES['imageSelector']['size'];
if (!$size || $size > MAX_FILE_SIZE) {
    error_log("ファイルサイズが大きすぎます！");
    exit;
}


$imagesize = getimagesize($_FILES['imageSelector']['tmp_name']);
 
switch($imagesize['mime']){
    case 'image/gif':
        $ext = '.gif';
        break;
    case 'image/jpeg':
        $ext = '.jpg';
        break;
    case 'image/png':
        $ext = '.png';
        break;
    default:
        echo '<message val="GIF/JPEG/PNG only!"/>';
        exit;
}


$filename = sha1(uniqid(mt_rand(), TRUE)).$ext;
$filePath = TMP_IMG_DIR . $filename;
if (move_uploaded_file($_FILES['imageSelector']['tmp_name'], $filePath)) {
    // $data = array('filename' => $filename);
} else {
    // $data = array('error' => 'Failed to save');
    echo '<message val="一時保存に失敗しました。"/>';
    exit;
}

// error_log($filePath);

list($width, $height) = getimagesize($filePath);

// error_log($width.':'.$height);

// 縦横IMAGE_MAX_LENGTH以内に縮小
error_log(IMAGE_MAX_LENGTH);
if ($width > IMAGE_MAX_LENGTH || $height > IMAGE_MAX_LENGTH) {

	if ($width > $height) {
		$height = round($height * IMAGE_MAX_LENGTH / $width);
		$width = IMAGE_MAX_LENGTH;
	} elseif ($width < $height) {
		$width = round($width * IMAGE_MAX_LENGTH / $height);
		$height = IMAGE_MAX_LENGTH;
	} else {
		$width = IMAGE_MAX_LENGTH;
		$height = IMAGE_MAX_LENGTH;
	}

	include ('image.php');
	$image = new Image($filePath);
	$image->Resize($width, $height)->Save();
}



$postfields = array("image"=>"@".$filePath);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://detectface.com/api/detect");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
curl_exec($ch);

//var_dump(curl_exec($ch));
//error_log(print_r(curl_exec($ch))); // Webサーバのエラーログに記述す
curl_close ($ch);

unlink($filePath);