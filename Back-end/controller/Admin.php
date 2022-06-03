<?php
header('Access-Control-Allow-Origin: *'); // * OR https://www.reddit.com/
header('Content-Type: application/json ; charset=utf-8');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
// header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");

require __DIR__ . '../../model/AdminMethods.php';

class Admin
{

    // sign in function for client

    public function SignInAdmin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $new = new AdminMethods();
        // check if email exists

        $check = $new->SignInAdmin($email, $password);

        if ($check) {
            http_response_code(200);
            echo json_encode(array("message" => "you're logged as client", "idAdmin" => $check['id'], "AdminName" => $check['first_name']));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Password or email is wrong"));
        }
    }

    // function for get client information

    public function GetAdmin()
    {
        $new = new AdminMethods();
        $var = $new->GetAdmin();

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // function for get all clients

    public function GetClients()
    {
        $new = new AdminMethods();
        $var = $new->GetClients();

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // function for get all workers

    public function GetWorkers()
    {
        $new = new AdminMethods();
        $var = $new->GetWorkers();

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // function for get all workers

    public function GetNewUsers()
    {
        $new = new AdminMethods();
        $var = $new->GetNewUsers();

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // function for get all workers

    public function GetDates()
    {
        $new = new AdminMethods();
        $var = $new->GetDates();

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // function for get total posts

    public function GetTotalPosts()
    {
        $new = new AdminMethods();
        $var = $new->GetTotalPosts();

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // function for get total comments

    public function GetTotalComments()
    {
        $new = new AdminMethods();
        $var = $new->GetTotalComments();

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // function for get total category's

    public function GetTotalCategory()
    {
        $new = new AdminMethods();
        $var = $new->GetTotalCategory();

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // function for get total category's

    public function GetTotalUsers()
    {
        $new = new AdminMethods();
        $var = $new->GetTotalUsers();

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // function to get all posts

    public function GetAllPosts()
    {
        $new = new AdminMethods();
        $var = $new->GetAllPosts();
        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "No posts for now"));
        }
    }
}
