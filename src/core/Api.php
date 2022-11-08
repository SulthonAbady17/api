<?php 

class Api {
    public function __construct()
    {
        header("Content-type: application/json;charset=UTF-8");
        header("Accept: application/json");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Header: X-Requested-With");
    }

    public function model($model)
    {
        require_once '../v1/src/models/' . $model . '.php';
        return new $model;
    }

    public function message($code,$message,$data)
    {
        http_response_code($code);
        $response = [
            "status" => [
                "message" => $message,
                "code" => $code
            ],
            "data" => $data
        ];

        return json_encode($response);
    }
}