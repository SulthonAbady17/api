<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$data = file_get_contents('data.json');
echo $data;