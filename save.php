<?php
function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

//ini_set('error_log', '/virtual/calico/log/error.log') ;
//$IMAGE_DIR_PTH = '/var/www/html/mayuge/img/';
$IMAGE_STORE_PATH = './imgstore/';

if (is_null($_POST['currentFile']) || $_POST['currentFile'] == "") {
    // 新規ファイルアップロード
    $fileNameBase = generateRandomString();
} else {
    $fileNameBase = $_POST['currentFile'];
}
// $filename = strtolower(basename($_FILES['mayugedImage']['name']));
$filename = $fileNameBase.".png";
if (move_uploaded_file($_FILES['mayugedImage']['tmp_name'], $IMAGE_STORE_PATH . $filename)) {
    $data = array('filename' => $filename);
} else {
    $data = array('error' => 'Failed to save');
}
// error_log(print_r($data));

echo $fileNameBase;

