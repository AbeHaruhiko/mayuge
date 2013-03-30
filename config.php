<?php


define('IMAGE_STORE_PATH', './imgstore/');
define('TMP_IMG_DIR', './tmpimg/');
 
define('IMAGE_MAX_LENGTH', 500);
define('MAX_FILE_SIZE', 1024 * 2000); // 300KB = 1KB/1024bytes * 300
 
// error_reporting(E_ALL & ~E_NOTICE);
 
// // GD
// if (!function_exists('imagecreatetruecolor')) {
//     echo "GDがインストールされていません！";
//     exit;
// }