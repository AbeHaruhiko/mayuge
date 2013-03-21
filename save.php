<?php
//ini_set('error_log', '/virtual/calico/log/error.log') ;
//$IMAGE_DIR_PTH = '/var/www/html/mayuge/img/';
$IMAGE_STORE_PATH = './imgstore/';

if (is_null($_POST['currentFile']) || $_POST['currentFile'] == "") {
    // 新規ファイルアップロード
    $fileNameBase =  md5(uniqid(mt_rand(), TRUE));
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

