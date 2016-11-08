<?php
header('Content-type:application/json;charset=utf-8');
echo "hello world";
$path = $_SERVER['REQUEST_URI']?:'/';
echo $path;
