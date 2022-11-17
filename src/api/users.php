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
                // var_dump($data);
                
                if(!empty($data['name'])) {
                    if(!empty($data['email'])) {
                        if(!empty($data['phone'])) {
                            $result = $this->model('userModel')->addUser($data);

                            if($result > 0) {
                                echo $this->message(201, "success", "user added successfully");
                            } else {
                                echo $this->message(400, "failed", "user added fail");
                                break;
                            }
                        } else {
                            echo $this->message(400, "failed", "phone is required");
                            break;
                        }
                    } else {
                        echo $this->message(400, "failed", "email is required");
                        break;
                    }
                } else {
                    echo $this->message(400, "failed", "name is required");
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
            case "DELETE":
                $rows = $this->model('userModel')->deleteUser($id);

                $message = [
                    "response" => "User $id deleted",
                    "rows" => $rows
                ];
                
                echo $this->message(200, "success", $message);
                break;
            case "PATCH":
                $data = json_decode(file_get_contents("php://input", true));

                // $data = file_get_contents("php://input");

                // parse_str(file_get_contents('php://input'), $data);

                // $data = $_POST;

                var_dump($data);
                // echo $data['id'];

                if(empty($data)) {
                    var_dump('kontol');
                }

                if(!empty($data['id'])) {
                    // var_dump($id);
                    $result = $this->model('userModel')->editUser($data, $id);

                    if($result > 0) {
                        $this->message(200, "success", "user updated successfully");
                        break;
                    } else {
                        $this->message(400, "failed", "failed to update an user");
                        break;
                    }
                } else {
                    $this->message(404, "failed", "user not found");
                    break;
                }

                // if(!empty($data['name'])) {
                //     if(!empty($data['email'])) {
                //         if(!empty($data['phone'])) {
                //             $result = $this->model('userModel')->editUser($data, $user);

                //             if($result > 0) {
                //                 echo $this->message(201, "success", "user edited successfully");
                //             } else {
                //                 echo $this->message(400, "failed", "user edited fail");
                //                 break;
                //             }
                //         } else {
                //             echo $this->message(400, "failed", "phone is required");
                //             break;
                //         }
                //     } else {
                //         echo $this->message(400, "failed", "email is required");
                //         break;
                //     }
                // } else {
                //     echo $this->message(400, "failed", "name is required");
                //     break;
                // }
            default:
                http_response_code(405);
                header("Allow: GET, PATCH. DELETE");
        }
    }
}