<?php
$url = "http://developers.facebook.com/tools/debug/og/object?q=".$_GET['url'];
$useragent = "Opera/9.80 (X11; Linux x86_64; U; en) Presto/2.10.229 Version/11.60";

if ( $ch = curl_init( $url ) )
{
    curl_setopt( $ch , CURLOPT_HEADER , 0 );
    curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true );
    curl_setopt( $ch , CURLOPT_USERAGENT , $useragent );
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $str_response = curl_exec( $ch );

    if( curl_errno( $ch ) != 0 )
    {
        $message = 'cURL exec error: ' . $ch;

        error_log( $message );
    }

    curl_close( $ch );
}
else
{
    $message = 'cURL init with url: ' . $url . ' failed';

    error_log( $message );
}