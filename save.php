<?php
require_once('config.php');

//ini_set('error_log', '/virtual/calico/log/error.log') ;

if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
    echo "エラーが発生しました : ".$_FILES['image']['error'];
    exit;
}

if (is_null($_POST['currentFile']) || $_POST['currentFile'] == "") {
    // ¿·µ¬¥Õ¥¡¥¤¥ë¥¢¥Ã¥×¥í¡¼¥É
    $fileNameBase =  sha1(uniqid(mt_rand(), TRUE));
} else {
    $fileNameBase = $_POST['currentFile'];
}
// $filename = strtolower(basename($_FILES['mayugedImage']['name']));
$filename = $fileNameBase.".png";
if (move_uploaded_file($_FILES['mayugedImage']['tmp_name'], IMAGE_STORE_PATH . $filename)) {
    $data = array('filename' => $filename);
} else {
    $data = array('error' => 'Failed to save');
}
// error_log(print_r($data));

echo $fileNameBase;

