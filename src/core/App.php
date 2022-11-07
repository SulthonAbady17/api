<?php 

class App {
    public function __construct()
    {
        $url = $this->parseURL();
        
        if(file_exists('../v1/src/api/' . $url[2]. '.php')) {
            require_once '../v1/src/api/' . $url[2] . '.php';
    
            $api = new $url[2];
            $api->processMethod($_SERVER['REQUEST_METHOD'], $url[3]);
        } else {
            http_response_code(404);
            exit;
        }

    }

    public function parseURL(): array
    {
        // $url = $_GET['url'];
        $parts = explode('/', $_SERVER['REQUEST_URI']);

        // return json_encode($parts);
        return $parts;
    }
}