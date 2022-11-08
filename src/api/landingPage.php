<?php 

class landingPage extends Api {
    public function processMethod(string $method, ?string $id)
    {
        if($method == "GET") {
            $data = [
                'title' => 'Home',
                'brand' => 'Bakti Gay',
                'hero' => [
                    'title' => 'Class E',
                    'cto' => 'Go to app'
                ]
            ];
            
            echo $this->message(200, true, $data);
        } else {
            echo $this->message(404,false, ['Not found!']);
        }
    }
}