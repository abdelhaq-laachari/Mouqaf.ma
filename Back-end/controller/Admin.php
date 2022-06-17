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
            echo json_encode(array("message" => "you're logged as admin", "idAdmin" => $check['id'], "AdminName" => $check['first_name']));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Password or email is wrong"));
        }
    }


    // update client information
    public function UpdateAdmin()
    {
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $idAdmin = $_POST['idAdmin'];
        // image name
        $file_name = $_FILES['file']['name'];
        // new name for image
        if ($file_name != null) {
            $new_name = time() . $file_name;
        } else {
            $new_name = "default.png";
        }
        // image path
        $file_tmp = $_FILES['file']['tmp_name'];
        // store image in folder
        // $upload_folder = 'uploads/PostImage/';
        $upload_folder = 'C:/youcode/Mouqaf.ma/front-end/mouqaf/public/uploads/admin/';
        // file extension of image only jpg, png, jpeg
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        // filter image extension
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == '') {
            // move image to folder
            $moveFile = move_uploaded_file($file_tmp, $upload_folder . $new_name);

            $new = new AdminMethods();
            $var = $new->UpdateAdmin($idAdmin, $Fname, $Lname, $new_name, $phone, $email);

            if ($var) {
                http_response_code(200);
                echo json_encode(array("message" => "Your information has been successfully updated."));
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "error"));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "You can upload only jpg, jpeg, png"));
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

    // function for get total comments

    public function GetTotalReports()
    {
        $new = new AdminMethods();
        $var = $new->GetTotalReports();

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

    // function to get all reports

    public function GetAllReports()
    {
        $new = new AdminMethods();
        $var = $new->GetAllReports();
        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "No Reports for now"));
        }
    }


    // Delete reported comment

    public function DeleteComment($idComment)
    {
        $cancel = new AdminMethods();
        $cancel->DeleteComment($idComment);
        http_response_code(200);
        echo json_encode(array("message" => "Comment Has Been Deleted Successfully"));
    }

    // Delete user post

    public function DeleteUser($idUser)
    {
        $cancel = new AdminMethods();
        $cancel->DeleteUser($idUser);
        http_response_code(200);
        echo json_encode(array("message" => "User Has Been Deleted Successfully"));
    }

    // Delete user post

    public function DeleteUserPost($idPost)
    {
        $cancel = new AdminMethods();
        $cancel->DeleteUserPost($idPost);
        http_response_code(200);
        echo json_encode(array("message" => "Post Has Been Deleted Successfully"));
    }

    
    // function to get all categories

    public function GetCategory()
    {
        $new = new AdminMethods();
        $var = $new->GetCategory();
        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    
    // Delete user post

    public function DeleteCategory($idCategory)
    {
        $cancel = new AdminMethods();
        $cancel->DeleteCategory($idCategory);
        http_response_code(200);
        echo json_encode(array("message" => "Category Has Been Deleted Successfully"));
    }

    //function add category 
    public function AddCategory()
    {
        $name = $_POST["name"];
        $new = new AdminMethods();
        $var = $new->AddCategory($name);
        if ($var) {
            http_response_code(200);
            echo json_encode(array("message" => "Category Has Been Added Successfully"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

}
