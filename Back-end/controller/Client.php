<?php
header('Access-Control-Allow-Origin: *'); // * OR https://www.reddit.com/
header('Content-Type: application/json ; charset=utf-8');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
// header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");

require __DIR__ . '../../model/ClientMethods.php';

class Client
{

    // sign up client function
    public function SignUp()
    {
        $Fname = $_POST['first_name'];
        $Lname = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // The hash of the password that
        // can be stored in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $logC = new ClientMethods();
        $var = $logC->SignUp($Fname, $Lname, $email, $hashed_password);

        if ($var) {
            http_response_code(200);
            echo json_encode(array("message" => "signUp"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // sign in client function
    // public function SignIn()
    // {
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];

    //     $logC = new ClientMethods();
    //     $var = $logC->SignIn($email, $password);

    //     if ($var) {
    //         http_response_code(200);
    //         echo json_encode(array("message" => "signIn"));
    //     } else {
    //         http_response_code(400);
    //         echo json_encode(array("message" => "error"));
    //     }
    // }

    public function SignIn()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = '';
        echo 'test';
        echo $role;

        $new = new ClientMethods();
        // check if email exists

        $check = $new->SignIn($email, $role);

        if ($check) {
            // check password
            $verify = password_verify($password, $check['password']);

            if ($verify) 
            {
                http_response_code(200);
                echo json_encode(array("message" => "you're logged in"));
                echo $role;
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "Password or email is wrong"));
            }
        }else {
            http_response_code(400);
            echo json_encode(array("message" => "Password or email is wrong"));
        }
    }
}
