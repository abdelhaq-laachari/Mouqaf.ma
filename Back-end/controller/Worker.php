<?php
header('Access-Control-Allow-Origin: *'); // * OR https://www.reddit.com/
header('Content-Type: application/json ; charset=utf-8');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
// header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");

require __DIR__ . '/../model/WorkerMethods.php';

class Worker 
{



    // sign in function for worker

    public function SignIn()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $new = new WorkerMethods();
        // check if email exists

        $check = $new->SignIn($email);

        if ($check) {
            // check password
            $verify = password_verify($password, $check['password']);

            if ($verify) 
            {
                http_response_code(200);
                echo json_encode(array("message" => "you're logged as worker"));
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "Password or  email is wrong"));
            }
        }
        else {
            http_response_code(400);
            echo json_encode(array("message" => "Password or email is wrong"));
        }
    }
}
