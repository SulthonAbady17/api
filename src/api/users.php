<?php 

class users extends Api {
    public function processMethod(string $method, ?string $id)
    {
        if($id) {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    public function processCollectionRequest($method) {
        switch($method) {
            case "GET":
                echo $this->message(200, "success", $this->model('userModel')->getAllUsers());
                break;
            case "POST":
                $data = $_POST;

                $res = $this->model('userModel')->addUser($data);

                if($res > 0) {
                    echo $this->message(201, "success", "user added successfully");
                } else {
                    echo $this->message(409, "failed", "user add failed");
                    break;
                }
                break;
            default:
            http_response_code(405);
            header("Allow: GET, POST");
        }
    }

    public function processResourceRequest($method, $id)
    {
        $user = $this->model('userModel')->getUserById($id);

        if(!$user) {
            echo $this->message(404, "failed", "user not found!");
            return;
        }

        switch($method) {
            case "GET":
                echo $this->message(200, "success", $user);
                break;
        }
    }
}