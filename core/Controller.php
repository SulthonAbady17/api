<?php 

class Controller {
	public function __construct()
	{
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
		header('Access-Control-Allow-Headers: X-Requested-With');
		header('Content-Type: application/json');
	}
	
	public function model($model)
	{
		require_once '../models/' . $model . '.php';
		return new $model;
	}

	public function response(int $code, string $status, array $data)
	{
		http_response_code($code);

		echo json_encode([
			"code" => $code,
			"status" => $status,
			"data" => $data
		]);
	}
}