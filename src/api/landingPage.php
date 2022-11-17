<?php 

class landingPage extends Api {
    public function processMethod(string $method, ?string $id)
    {
        if($method == "GET") {
            $data = [
                'title' => 'Home',
                'header' => [
                    'brand' => 'Storitour',
                    'nav' => ['Beranda', 'Tentang', 'Portfolio', 'Clients', 'Blog', 'Contact']
                ],
                'brand' => 'Andru Christo',
                'hero' => [
                    'title' => 'Andru',
                    'cto' => 'Download'
                ]
            ];
            
            echo $this->message(200, true, $data);
        } else {
            echo $this->message(404,false, ['Not found!']);
        }
    }
}