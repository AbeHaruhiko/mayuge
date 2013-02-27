<?php
//絶対パス
echo __FILE__ . '<br />';

//ディレクトリパス
echo dirname(__FILE__) . '<br />';

//スクリプト名
echo basename(__FILE__) . '<br />';

//指定した拡張子を取り除いたスクリプト名
echo basename(__FILE__, '.php');
?>