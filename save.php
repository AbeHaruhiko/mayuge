<?php
require_once('config.php');

ini_set('error_log', '/virtual/calico/log/error.log') ;

if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
    echo "エラーが発生しました : ".$_FILES['image']['error'];
    exit;
}
// error_log($_POST['currentFile']);
if (is_null($_POST['currentFile']) || $_POST['currentFile'] == "") {
    // ¿·µ¬¥Õ¥¡¥¤¥ë¥¢¥Ã¥×¥í¡¼¥É
    // error_log('うえ');
    $fileNameBase =  sha1(uniqid(mt_rand(), TRUE));
} else {
    error_log('した');
    $fileNameBase = $_POST['currentFile'];
}
// $filename = strtolower(basename($_FILES['mayugedImage']['name']));
error_log($fileNameBase);
$filename = $fileNameBase.".png";
if (move_uploaded_file($_FILES['mayugedImage']['tmp_name'], IMAGE_STORE_PATH . $filename)) {
    $data = array('filename' => $filename);
} else {
    $data = array('error' => 'Failed to save');
}
// error_log(print_r($data));

echo $fileNameBase;

