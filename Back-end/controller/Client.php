<?php
header('Access-Control-Allow-Origin: *'); // * OR https://www.reddit.com/
header('Content-Type: application/json ; multipart/form-data; charset=utf-8');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
// header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");

require __DIR__ . '../../model/ClientMethods.php';

class Client
{

    // function for get client information

    public function GetOneClient($idClient)
    {
        $new = new ClientMethods();
        $var = $new->GetOneClient($idClient);

        if ($var) {
            http_response_code(200);
            echo json_encode(array($var));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // update client information
    public function UpdateClient()
    {
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $idClient = $_POST['idClient'];
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
        $upload_folder = 'C:/youcode/Mouqaf.ma/front-end/mouqaf/public/uploads/ClientProfile/';
        // file extension of image only jpg, png, jpeg
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        // filter image extension
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == '') {
            // move image to folder
            $moveFile = move_uploaded_file($file_tmp, $upload_folder . $new_name);

            $new = new ClientMethods();
            $var = $new->UpdateClient($idClient, $Fname, $Lname, $new_name, $phone, $email);

            if ($var) { 
                http_response_code(200);
                echo json_encode(array("message" => "Your information has been successfully updated."));
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "something went wrong please try again"));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "You can upload only jpg, jpeg, png"));
        }
    }

    // sign up client function
    public function SignUp()
    {
        $Fname = $_POST['first_name'];
        $Lname = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $from = $_POST['city'];
        $signed_at = date("Y-m-d");

        // The hash of the password that
        // can be stored in the database
        $logC = new ClientMethods();
        $check = $logC->check($email);
        if($check == null){

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            $var = $logC->SignUp($Fname, $Lname, $phone, $email, $hashed_password, $role, $from, $signed_at);
    
            if ($var) {
                http_response_code(200);
                echo json_encode(array("message" => "signUp"));
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "error"));
            }
        }else{
            http_response_code(400);
            echo json_encode(array("message" => "Email already exist"));
        }
    }


    // sign in function for client

    public function SignIn()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $new = new ClientMethods();
        // check if email exists

        $check = $new->SignIn($email);

        if ($check) {
            // check password
            $verify = password_verify($password, $check['password']);

            if ($verify) {
                http_response_code(200);
                echo json_encode(array("message" => "you're logged as client", "id" => $check['id'], "name" => $check['first_name']));
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "Password or email is wrong"));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Password or email is wrong"));
        }
    }


    // function to get all categories

    public function GetCategory()
    {
        $new = new ClientMethods();
        $var = $new->GetCategory();
        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // Function to create a new post for client

    public function CreatePost()
    {
        // post title
        $post_title = $_POST['title'];
        // post description
        $description = $_POST['description'];
        // post owner
        $idClient = $_POST['idClient'];
        // post category
        $idCategory = $_POST['idCategory'];
        // owner city
        $city = $_POST['city'];
        // image name
        $file_name = $_FILES['file']['name'];
        // new name for image
        if ($file_name != null) {
            $new_name = time() . $file_name;
        } else {
            $new_name = null;
        }
        // image path
        $file_tmp = $_FILES['file']['tmp_name'];
        // store image in folder
        // $upload_folder = 'uploads/PostImage/';
        $upload_folders = 'C:/youcode/Mouqaf.ma/front-end/mouqaf/public/uploads/PostImage/';
        // file extension of image only jpg, png, jpeg
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        // filter image extension
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == '') {
            // move image to folder
            $moveFile = move_uploaded_file($file_tmp, $upload_folders . $new_name);

            $new = new ClientMethods();
            $var = $new->CreatePost($idClient, $idCategory, $post_title, $description, $new_name, $city);

            if ($var) {
                http_response_code(200);
                echo json_encode(array("message" => "Your post has been successfully created."));
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "error"));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "You can upload only jpg, jpeg, png"));
        }
    }


    // time of creation post

    public function get_time_ago($time)
    {
        // $time = "2022-06-05 18:01:33";
        $now = time() - 3600;
        $time_difference = $now - $time;

        if ($time_difference < 1) {
            return 'less than 1 second ago';
        }
        $condition = array(
            12 * 30 * 24 * 60 * 60 =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;

            if ($d >= 1) {
                $t = round($d);
                $string = 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
                // echo json_encode($string);
                return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
            }
        }
    }

    // function to get all posts

    public function GetAllPosts()
    {
        $new = new ClientMethods();
        $var = $new->GetAllPosts();
        foreach ($var as $key => $element) {
            $var[$key]['created_at'] = $this->get_time_ago(strtotime($element['created_at']));
        }
        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "No posts for now"));
        }
    }

    // function to search for posts by city and category

    public function SearchPosts()
    {
        $idCategory = $_POST['idCategory'];
        $city = $_POST['city'];

        $new = new ClientMethods();
        $var = $new->SearchPosts($idCategory, $city);
        foreach ($var as $key => $element) {
            $var[$key]['created_at'] = $this->get_time_ago(strtotime($element['created_at']));
        }
        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "There is no post in this category"));
        }
    }

    // function to search for posts by city

    public function SearchPostsByCity()
    {
        $city = $_POST['city'];

        $new = new ClientMethods();
        $var = $new->SearchPostsByCity($city);
        foreach ($var as $key => $element) {
            $var[$key]['created_at'] = $this->get_time_ago(strtotime($element['created_at']));
        }
        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "There is no post in this city"));
        }
    }

    // function to search for posts by category

    public function SearchPostsByCategory()
    {
        $idCategory = $_POST['idCategory'];

        $new = new ClientMethods();
        $var = $new->SearchPostsByCategory($idCategory);
        foreach ($var as $key => $element) {
            $var[$key]['created_at'] = $this->get_time_ago(strtotime($element['created_at']));
        }
        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "There is no post in this category"));
        }
    }


    // get post by id

    public function MyPosts($idClient)
    {

        $new = new ClientMethods();

        $var = $new->MyPosts($idClient);
        foreach ($var as $key => $element) {
            $var[$key]['created_at'] = $this->get_time_ago(strtotime($element['created_at']));
        }

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "You don't have any post right now"));
        }
    }

    // get my single post by id

    public function MySinglePost($idPost)
    {

        $new = new ClientMethods();
        $var = $new->MySinglePost($idPost);
        foreach ($var as $key => $element) {
            $var[$key]['created_at'] = $this->get_time_ago(strtotime($element['created_at']));
        }


        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // Delete my own post

    public function DeleteMyPost($idPost)
    {
        $cancel = new ClientMethods();
        $cancel->DeleteMyPost($idPost);
        http_response_code(200);
        echo json_encode(array("message" => "Your Post Has Been Deleted Successfully"));
    }

    // get comments by post id
    public function GetComments($idPost)
    {

        $new = new ClientMethods();
        $var = $new->GetComments($idPost);
        foreach ($var as $key => $element) {
            $var[$key]['created'] = $this->get_time_ago(strtotime($element['created']));
        }

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "No comments for now"));
        }
    }

    // get total comments
    public function TotalComments($idPost)
    {
        $new = new ClientMethods();
        $var = $new->TotalComments($idPost);

        if ($var) {
            http_response_code(200);
            echo json_encode($var);
        }
    }

    // function for get client information

    public function GetOneComment($idComment)
    {
        $new = new ClientMethods();
        $var = $new->GetOneComment($idComment);

        if ($var) {
            http_response_code(200);
            echo json_encode(array($var));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    // report comment
    public function ReportComment()
    {

        $idUser = $_POST['idUser'];
        $idComment = $_POST['idComment'];
        $topic = $_POST['topic'];


        $new = new ClientMethods();
        // echo json_encode(array("message" =>$topic));

        $var = $new->ReportComment($idUser, $idComment, $topic);
        if ($var) {
            http_response_code(200);
            echo json_encode(array("message" => "Greate your report has been send to the admin"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Something wont wrong"));
        }
    }
}
