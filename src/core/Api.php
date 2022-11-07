<?php 

class Api {
    public function model($model)
    {
        require_once '../v1/src/models/' . $model . '.php';
        return new $model;
    }

    public function message($code,$status,$data)
    {
        http_response_code($code);
        $response = [
            'success' => $status,
            'status_code' => $code,
            'data' => $data
        ];

        return json_encode($response);
    }
}