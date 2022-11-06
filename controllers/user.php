<?php 

class user extends Controller {
    private $method = $_SERVER['REQUEST_METHOD'];
    private $id = intval($_GET['id'] ?? '');

    public function getAll()
    {
     var_dump("fasdf");   
        if($this->method == "GET") {
            if($_GET['id'] != 0) {
                // $data = $this->model('userModel')->getAllUsers();

                // $this->response(200, "Success", $data);
            } else {
                $data = $this->model('userModel')->getAllUsers();

                $this->response(200, "Success", $data);
            }
        }
    }
}