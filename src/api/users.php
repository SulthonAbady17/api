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
                echo $this->message(200, true, $this->model('userModel')->getAll());
        }
    }

    public function processResourceRequest($method, $id)
    {
        
    }
}