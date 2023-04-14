<?php 
$flink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . ":"."//$_SERVER[HTTP_HOST]" . "//";
echo $flink;