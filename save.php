<?php
//ini_set('error_log', '/virtual/calico/log/error.log') ;

//$IMAGE_DIR_PTH = '/var/www/html/mayuge/img/';
$IMAGE_STORE_PATH = './imgstore/';

$filename = strtolower(basename($_FILES['mayugedImage']['name']));
if (move_uploaded_file($_FILES['mayugedImage']['tmp_name'], $IMAGE_STORE_PATH . $filename)) {
    $data = array('filename' => $filename);
} else {
    $data = array('error' => 'Failed to save');
}
error_log(print_r($data));