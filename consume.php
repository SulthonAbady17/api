<?php 

$data = file_get_contents('http://localhost/api/test.php');

$result = json_decode($data, true);
var_dump($result);